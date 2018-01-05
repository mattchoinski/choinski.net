# Cache is King

...or could also be something with the Michael Pollan line about "_Eat food. Not too much. Mostly plants._", such as "Send resources.  Not too much.  Mostly compressed."

## Why is this important?

...with examples.

## How can it be improved?

...with examples.


## Notes:

### Overview
One of the many ways to improve a web application's performance is to utilize a web browser's cache.  Caching simply means storing data locally so future requests are not re-sent from a web server - this makes web applications faster because parts of it do not have to be re-calculated or re-downloaded.

### It's How You Respond
When you navigate to a web application, your browser actually sends a request to a web server for web page.  The web server sends a response with all elements, such as images and scripts, needed for the web page.

The rendering of the page is slowed down because each resource has to be re-calculated and re-downloaded over a busy network.  In the screen shot above, [example needed] of resources is sent back to a person’s web browser.

### Cache Is King
However, when we enable caching on the web server, a person’s web browser only receives dynamic resources, such as an HTML page, or static resources that have changed.  The following network analyzer screen shot shows the dramatic difference.

In this screen shot, only about [example needed] is sent back to a person’s web browser (and the time taken to render a web page is significantly improved).

### ...the Need for Speed

There are many articles, postings, and websites that discuss how "[the slower your website loads and displays, the less people will use it.](http://blog.codinghorror.com/performance-is-a-feature/)"  And according to the [blog post](http://blog.codinghorror.com/performance-is-a-feature/) with that quote:

> [Google found that] the page with 10 results took 0.4 seconds to generate. The page with 30 results took 0.9 seconds. Half a second delay caused a 20% drop in traffic. Half a second delay killed user satisfaction.

>In A/B tests, [Amazon] tried delaying the page in increments of 100 milliseconds and found that even very small delays would result in substantial and costly drops in revenue.

How much time are talking about?  The [Nielsen Norman Group found](https://www.nngroup.com/articles/response-times-3-important-limits/) that:

>Therefore, the response time guidelines for web-based applications are the same as for all other applications. These guidelines have been the same for 46 years now, so they are also not likely to change with whatever implementation technology comes next.
>
>0.1 second: Limit for users feeling that they are directly manipulating objects in the UI. For example, this is the limit from the time the user selects a column in a table until that column should highlight or otherwise give feedback that it's selected. ...
>
1 second: Limit for users feeling that they are freely navigating the command space without having to unduly wait for the computer. A delay of 0.2–1.0 seconds does mean that users notice the delay and thus feel the computer is "working" on the command, as opposed to having the command be a direct effect of the users' actions. ...
>
>10 seconds: Limit for users keeping their attention on the task. Anything slower than 10 seconds needs a percent-done indicator as well as a clearly signposted way for the user to interrupt the operation. ...

### “If everything seems under control, you're not going fast enough.”

Applying best practices and being careful how and when data is accessed leads to better performance with software applications - and better performance is expected and must be delivered even [example needed].
