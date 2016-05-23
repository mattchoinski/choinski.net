docReady(
    function() {
        var elementBody = document.body;
        var elementBodyStyle = elementBody.style;
        var elementFooter = elementBody.getElementsByTagName("footer")[0];
        var elementFooterStyle = elementFooter.style;
        var elementHtmlStyle = document.documentElement.style;
        elementBodyStyle.height = "auto";
        elementHtmlStyle.height = "auto";
        if (elementFooter.getAttribute("bottom") !== undefined) {
            elementFooter.removeAttribute("bottom")
        }
        elementFooterStyle.position = "relative";
        if (window.innerHeight > elementBody.clientHeight) {
            elementBodyStyle.height = "100%";
            elementHtmlStyle.height = "100%";
            elementFooterStyle.bottom = "0";
            elementFooterStyle.position = "absolute";
        }
    }
);