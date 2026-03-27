/* Branding plugin - authenticated pages (favicon + page title) */
(function(){
    'use strict';
    var b=(function(){var s=document.querySelector('script[src*="/plugins/branding/"]');
    if(s){var i=s.src.indexOf('/plugins/branding/');return s.src.substring(0,i);}return '';})();
    var v=(function(){var s=document.querySelector('script[src*="/plugins/branding/"]');
    return s?(s.src.split('?v=')[1]||''):'';})();
    var x=new XMLHttpRequest();
    x.open('GET',b+'/plugins/branding/config.json?v='+v,true);
    x.onload=function(){
        if(x.status!==200)return;
        try{var c=JSON.parse(x.responseText);}catch(e){return;}
        if(c.favicon){
            document.querySelectorAll('link[rel="icon"],link[rel="shortcut icon"]').forEach(function(e){e.remove();});
            var l=document.createElement('link');l.rel='icon';l.href=b+c.favicon;document.head.appendChild(l);
        }
        if(c.page_title){document.title=document.title.replace(/GLPI/g,c.page_title);}
    };
    x.send();
})();
