function do_render(){
    hljs.initHighlighting();
}
var render_hljs=function(){
    do_render();
    var titleEl = document.getElementsByTagName("title")[0];
    var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
    if(MutationObserver){
        var MutationObserverConfig={
            childList: true,
            subtree: true,
            characterData: true
        };
        var observer=new MutationObserver(function(mutations){
            do_render();
        });
        observer.observe(titleEl,MutationObserverConfig);
    }
    else if(titleEl.addEventListener){
        titleEl.addEventListener("DOMSubtreeModified", function(evt) {
            do_render();
        }, false);
    }
    else{
        console.log('unsupported browser');
    }
};
render_hljs();
