(function (window) {
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    document.addEventListener("DOMContentLoaded", function (e) {
        var tabsMenuButtons = document.querySelectorAll(".hh-accordion > .tabs > .menu-tabs > button");

        // check if location.hash is given on page-load // new request
        if (window.location.hash) {
            if (window.location.hash.startsWith("#panel")) {
                toggleTabsContent(window.location.hash);
            }
        }

        // add on click-event on all .hh-accordion .menu-tabs button-html-tags
        for (i = 0; i < tabsMenuButtons.length; i++) {
            tabsMenuButtons[i].addEventListener("click", function (event) {
                const hashId = event.target.getAttribute("data-hash");
                toggleTabsContent(hashId);
            }, false);
        }

        /**
         * openContent
         * @param {String} hashId - example: "#tab325628"
         */
        function openContent(hashId) {
            document.querySelector(".hh-accordion > .tabs > .menu-tabs > button[data-hash='" + hashId + "']").ariaSelected = true;
            document.querySelector(".hh-accordion > .tabs > " + hashId).hidden = false;
            window.history.pushState(null, null, hashId);
        }

        /**
         * closeAllTabs - close all other Tab-tags which are not selected (hashId)
         * @param {String} hashId - example: "#tab325628"
         */
        function closeAllTabs(hashId) {
            var otherTabs = document.querySelectorAll(".hh-accordion > .tabs > .menu-tabs > button:not([data-hash='" + hashId + "'])");
            otherTabs.forEach(function(button) {
                button.ariaSelected = false;
                window.history.pushState(null, "", " ");
            });
            var tabContent = document.querySelectorAll(".hh-accordion > .tabs > .content");
            tabContent.forEach(function(content) {
                content.hidden = true;
            });
        }

        /**
         * toggleTabsContent
         * @param {String} hashId - example: "#tab325628"
         */
        function toggleTabsContent(hashId) {
            if (document.querySelector(".hh-accordion > .tabs > .menu-tabs > button[data-hash='" + hashId + "']").ariaSelected === true) {
                // closeAllTabs(hashId);
            } else {
                closeAllTabs(hashId);
                openContent(hashId);
            }
        }

        window.addEventListener('hashchange', function() {
            const hashId = window.location.hash;
            closeAllTabs(hashId);
            openContent(hashId);
        }, false);
    });
})(window);
