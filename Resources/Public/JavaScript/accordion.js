if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}

function accOpenDetails(element) {
    element.open = true;
}

function accCloseDetails(element) {
    element.removeAttribute("open");
}

function accCloseDetailsMultiple(currentElement, allElements) {
    allElements.forEach((el) => {
        if(!currentElement.isEqualNode(el)) {
            accCloseDetails(el);
        }
    });
}

document.addEventListener("DOMContentLoaded", function (e) {
    document.querySelectorAll(".hh-accordion > .accordion").forEach(function(accWrapper) {
        const accDetails = accWrapper.querySelectorAll(":scope > details");

        if (window.location.hash) {
            if (window.location.hash.startsWith("#accordion")) {
                if(document.querySelector(window.location.hash) != null) {
                    accOpenDetails(document.querySelector(window.location.hash));
                }
                else {
                    console.log("Error: No element found with " + window.location.hash);
                }
            }
        }

        accDetails.forEach(function(el) {
            const accDetail = el;
            const accSummary = accDetail.querySelector("summary");

            accSummary.addEventListener("click", (e) => {
                accCloseDetailsMultiple(accDetail, accDetails);
                const dataHash = accSummary.getAttribute("data-hash");

                if(window.location.hash == dataHash) {
                    const url = window.location.href.replace(dataHash, '');
                    history.pushState(null, null, url);
                } else {
                    history.pushState(null, null, accSummary.getAttribute("data-hash"));
                }

                // accOpenDetails(accDetail); // Not needed, because HTML <details> component is opening/closing
            });
            window.addEventListener('hashchange', function() {
                const hash = document.querySelector(window.location.hash);
                if(hash != null){
                    accCloseDetailsMultiple(hash, accDetails);
                    accOpenDetails(hash);
                    hash.scrollIntoView();
                }
            }, false);
        });
    });
});
