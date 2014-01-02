#SharePoint REST API

Notes on how to use the SharePoint REST API to create custom solutions (without using WebParts or custom VisualStudio solutions).  These code snippets would utilize jQuery and custom HTML/CSS.


##Sample Code

	var result = "";
	$.ajax({
		async: false,
		url: "http://www.mysharepoint.com/_api/Web/GetUserById(" + userId + ")",
		headers: {"Accept": "application/json; odata=verbose"},
		type: "GET",
		success: function(data) {
			result = data.d.Title; /* "Title" refers to the person's name */
		}
	});

	$.ajax({
		url: "http://www.mysharepoint.com/_api/lists/getbytitle('MY_LIST')/items?$filter=User_ID eq '" + userId + "'&$orderby=ColumnA,ColumnB&$top=1000",
		headers: {"Accept": "application/json; odata=verbose"},
		success: function(data) {
			if (data.d.results.length > 0)
			{
				$.each(
					data.d.results,
					function(i, item) {
						myTable.append( "<tr><td>" + item.ColumnA + "</td></tr>" );
					}
				);
		},
		error: function(data) {
			resultsBody.append("<tr><td align=\"center\" colspan=\"5\">There was an error trying to load the data.</td></tr>");;
		}
	});

