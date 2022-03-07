(function (window) {
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    document.addEventListener("DOMContentLoaded", function (e) {
        var accDetails = document.querySelectorAll(".hh-accordion > .accordion > details");

        // check if location.hash is given on page-load // new request
        if (window.location.hash) {
            if (window.location.hash.startsWith("#accordion")) {
                document.querySelector("summary[data-hash='" + window.location.hash + "']").parentNode.open = true;
            }
        }

        // add on click-event on all .hh-accordion summary-html-tags
        for (i = 0; i < accDetails.length; i++) {
            var summary = accDetails[i].querySelector("summary");
            summary.addEventListener("click", function (event) {
                const hashId = event.target.getAttribute("data-hash");
                toggleAccDetails(hashId);
            }, false);
        }

        // FEATURE: if hash is set from another place outside of hh_accordion
        // window.addEventListener('hashchange', function() {
        //     toggleAccDetails(window.location.hash);
        // }, false);

        /**
         * openDetail
         * @param {String} hashId - example: "#accordion325628"
         */
        function openDetail(hashId) {
            window.history.pushState(null, null, hashId);
        }

        /**
         * closeAllDetails - close all other detail-tags which are not selected (hashId)
         * @param {String} hashId - example: "#accordion325628"
         */
        function closeAllDetails(hashId) {
            var otherSummary = document.querySelectorAll(".hh-accordion summary:not([data-hash='" + hashId + "'])");
            otherSummary.forEach(function (summary) {
                summary.parentNode.open = false;
                window.history.pushState(null, "", " ");
            });
        }

        /**
         * toggleAccDetails
         * @param {String} hashId - example: "#accordion325628"
         */
        function toggleAccDetails(hashId) {
            if (document.querySelector(".hh-accordion summary[data-hash='" + hashId + "']").parentNode.open) {
                closeAllDetails(hashId);
            } else {
                closeAllDetails(hashId);
                openDetail(hashId);
            }
        }
    });
})(window);
