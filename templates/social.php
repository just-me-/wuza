<div id="main_social">
    
    <h1>Social Media - WUZA ist auf Twitter!</h1>
    
    <a class="twitter-timeline" href="https://twitter.com/_wuza" data-widget-id="691359130787958784">Tweets von WUZA</a>
    <script>
        !function(d,s,id){
            var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
            if(!d.getElementById(id)){
                js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js,fjs);
            }
        }(document,"script","twitter-wjs");
        
        
        // resize to 100%
        $(document).ready(function() {
            twitterCheck = setInterval(function() {
                var twitterFrame = $("#twitter-widget-0");
                var twitterTimeline = twitterFrame.contents().find(".timeline");
                if(twitterFrame.length && twitterTimeline.length) {
                    twitterTimeline.attr("style","max-width:100% !important;");
                    twitterFrame.attr("style","max-width:100% !important; width: 100% !important;");
                    clearInterval(twitterCheck);
                }
            }, 50);
        });
    </script>
    
</div>
