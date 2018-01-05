# Using NAnt with Jenkins

Briefly, the problem being solved is how to transfer a .NET Web Application build to another server with a NAnt script.

Due to various restrictions, the Web Application build must be fetched and installed by the client.  The Web Application build must include the Web Application files as well as any database changes (which are scripted out in a file).  The Web Application build must also be named appropriately with the version numbering.

Due to the limitations with FTP operations in Jenkins, a custom C# class was developed to transfer the Web Application build to a FTP server.


## Sample Code

	<?xml version="1.0"?>
	<project name="MyWebApp" default="all">
		<property name="nant.settings.currentframework" value="net-3.5"/>
		<property name="base_path" value="C:\Program Files (x86)\Jenkins\jobs\MyWebApp\" />
		<property name="build_path" value="${base_path}workspace\application\MyWebApp\" />
		<property name="database_path" value="${base_path}workspace\database\" />
		<property name="release_path" value="${base_path}release\" />
		<property name="release_path_database" value="${release_path}database\" />
		<property name="release_path_web" value="${release_path}web\" />
	    <target name="all">
			<delete>
				<fileset>
					<include name="${release_path}*.zip" />
				</fileset>
			</delete>
			<copy todir="${release_path_web}" overwrite="true" verbose="true">
				<fileset basedir="${build_path}">
					<include name="**/*" />
					<exclude name="*.csproj" />
					<exclude name="**/*.cs" />
					<exclude name="**/*.designer.cs" />
					<exclude name="*.Debug.config" />
					<exclude name="*.Release.config" />
					<exclude name="config/*.dev.config" />
					<exclude name="config/*.local.config" />
					<exclude name="config/*.test.config" />
					<exclude name="obj/**/*" />
				</fileset>
			</copy>
			<loadfile file="${release_path_web}config\app.config" property="app.config">
				<filterchain>
					<replacestring from="dev" to="prod" ignorecase="true" />
				</filterchain>
			</loadfile>
			<echo file="${release_path_web}config\app.config" message="${app.config}" append="false" />
			<copy todir="${release_path_database}" overwrite="true" verbose="true">
				<fileset basedir="${database_path}">
					<include name="*_Changes.sql" />
				</fileset>
			</copy>
			<property name="assembly_build_version" value="${version::get-build(fileversioninfo::get-product-version(fileversioninfo::get-version-info('MyWebApp\bin\MyWebApp.dll')))}" />
			<property name="assembly_major_version" value="${version::get-major(fileversioninfo::get-product-version(fileversioninfo::get-version-info('MyWebApp\bin\MyWebApp.dll')))}" />
			<property name="assembly_minor_version" value="${version::get-minor(fileversioninfo::get-product-version(fileversioninfo::get-version-info('MyWebApp\bin\MyWebApp.dll')))}" />
			<property name="assembly_revision_version" value="${version::get-revision(fileversioninfo::get-product-version(fileversioninfo::get-version-info('MyWebApp\bin\MyWebApp.dll')))}" />
			<property name="release_file_name" value="MyWebApp_Release_v${assembly_major_version}.${assembly_minor_version}.${assembly_build_version}.${assembly_revision_version}.zip" />
			<zip zipfile="${release_path}\${release_file_name}" includeemptydirs="true" verbose="true">
				<fileset basedir="${release_path}">
					<include name="**/*" />
				</fileset>
			</zip>
			<delete>
				<fileset>
					<include name="${release_path_database}**/*" />
					<include name="${release_path_web}**/*" />
				</fileset>
			</delete>
			<script language="C#" prefix="custom">
				<references>
					<include name="mscorlib.dll" />
					<include name="Microsoft.CSharp.dll" />
					<include name="System.dll" />
					<include name="System.Configuration.dll" />
					<include name="System.Core.dll" />
					<include name="System.Net.dll" />
				</references>
				<imports>
					<import namespace="System.IO" />
					<import namespace="System.Net" />
					<import namespace="System.Text" />
				</imports>
				<code>
					<![CDATA[
						[TaskName("ftp")]
						public class FtpTask : Task
						{
							private string _fileDirectory;
							private string _fileName;

							[TaskAttribute("file_directory", Required=true)]
							public string FileDirectory
							{
								get
								{
									return _fileDirectory;
								}
								set
								{
									_fileDirectory = value;
								}
							}

							[TaskAttribute("file_name", Required=true)]
							public string FileName
							{
								get
								{
									return _fileName;
								}
								set
								{
									_fileName = value;
								}
							}

							protected override void ExecuteTask( )
							{
								Log( Level.Info, "Preparing to FTP the file: " + _fileDirectory + _fileName );

								FtpWebRequest request = ( FtpWebRequest )WebRequest.Create( "ftp://myftpsite.com/" + _fileName );
								request.Method = WebRequestMethods.Ftp.UploadFile;

								request.Credentials = new System.Net.NetworkCredential( "ftp_gedis", "GEDISgedis$$" );

								byte[] fileContents = File.ReadAllBytes( _fileDirectory + _fileName );
								request.ContentLength = fileContents.Length;

								Log( Level.Info, "File size: " + fileContents.Length.ToString() );

								Stream requestStream = request.GetRequestStream();
								requestStream.Write( fileContents, 0, fileContents.Length );
								requestStream.Close();

								FtpWebResponse response = ( FtpWebResponse )request.GetResponse();
								response.Close();

								Log( Level.Info, "FTP Transfer completed with a status of: " + response.StatusDescription );
							}
						}
					]]>
				</code>
			</script>
			<ftp file_directory="${release_path}" file_name="${release_file_name}" />
		</target>
	</project>
