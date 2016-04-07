var render_hljs=function(){
    hljs.initHighlighting();
    var titleEl = document.getElementsByTagName("title")[0];
    var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    if(MutationObserver){
        var MutationObserverConfig={
            childList: true,
            subtree: true,
            characterData: true
        };
        var observer=new MutationObserver(function(mutations){
            hljs.initHighlighting();
        });
        observer.observe(titleEl,MutationObserverConfig);
    }
    else if(titleEl.addEventListener){
        titleEl.addEventListener("DOMSubtreeModified", function(evt) {
            hljs.initHighlighting();
        }, false);
    }
    else{
        console.log('unsupported browser');
    }
};
render_hljs();
