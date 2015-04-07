<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
    !function(a){function b(b){var c="https://api.instagram.com/v1",d={};if(null==b.accessToken&&null==b.clientId)throw"You must provide an access token or a client id";if(d=a.extend(d,{access_token:b.accessToken||"",client_id:b.clientId||"",count:b.count||""}),null!=b.url)c=b.url;else if(null!=b.hash)c+="/tags/"+b.hash+"/media/recent";else if(null!=b.search)c+="/media/search",d=a.extend(d,b.search);else if(null!=b.userId){if(null==b.accessToken)throw"You must provide an access token";c+="/users/"+b.userId+"/media/recent"}else null!=b.location?(c+="/locations/"+b.location.id+"/media/recent",delete b.location.id,d=a.extend(d,b.location)):c+="/media/popular";return{url:c,data:d}}a.fn.instagram=function(c){var d=this;c=a.extend({},a.fn.instagram.defaults,c);var e=b(c);return a.ajax({dataType:"jsonp",url:e.url,data:e.data,success:function(a){d.trigger("didLoadInstagram",a)}}),this.trigger("willLoadInstagram",c),this},a.fn.instagram.defaults={accessToken:null,clientId:null,count:null,url:null,hash:null,userId:null,location:null,search:null}}(jQuery);
</script>
<style type="text/css">
.allowed-mark {
    background-color: #00BA3B;
    border-radius: 13px;
    padding: 3px;
    padding-bottom: 0;
    padding-right: 6px;
    padding-left: 6px;
    border: 2px solid white; 
    color: white;
    position: absolute;
    top: 5px;
    right: 5px;
}

</style>

<section class="page-content bg-handmouse">
    <div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">

      <?php while (have_posts()) : the_post(); ?>

      <div class="cover-title">
        <?php get_template_part('templates/page', 'header'); ?>
    </div>

    <?php if (is_user_logged_in()): ?>
    <section style="display:inline-block">
        <div class="rows" data-equalizer>
            <section id="instragram" class="small-12 columns no-pad" data-equalizer-watch style="padding-right:3px">
                <div class="no-pad section-title section-title-instragram">
                    <span class="section-title-pad">All</span>
                    <div style="float: right; margin-top:-1.5px; margin-bottom:-10px; margin-right: 5px;">
                        <button class="button" id="prev">prev</button>
                        <button class="button" id="next">next</button>
                    </div>
                </div>
                <div class="instagram-all"></div>
            </section>
        </div>
    </section>
</section>

<script type="text/javascript">
    var prevButton = document.getElementById("prev");
    var nextButton = document.getElementById("next");
    var page = [];
    var allowed = [];
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

    function unallow(e) {
        var id = e.data.id
        var img = e.data.img
        var link = e.data.link
        console.log(id)
        var index = allowed.indexOf(id)
        if (index > -1) { allowed.splice(index, 1); }

        var data = {
            'action': 'igadmin_remove_allowed',
            'ig_post_id': id,
            'imgurl': img,
            'link' : link
        };

        $.post(ajaxurl, data, function(response) {
            console.log('Got this from the server: ' + response);
        });

        $('#'+id).unbind( "click" );
        $('#'+id+' .allowed-mark').remove();
        $('#'+id).on("click",{id: id, img: img, link: link}, allow);
        console.log(allowed)
    }

    function allow(e) {
        var id = e.data.id
        var img = e.data.img
        var link = e.data.link
        console.log(id)
        allowed.push(id)

        var data = {
            'action': 'igadmin_add_new_allowed',
            'ig_post_id': id,
            'imgurl': img,
            'link' : link
        };

        $.post(ajaxurl, data, function(response) {
            console.log('Got this from the server: ' + response);
        });

        $('#'+id).unbind( "click" );
        $('#'+id).append("<span class='allowed-mark'>&#10004;</span>");
        $('#'+id).on("click",{id: id, img: img, link: link}, unallow);
        console.log(allowed)
    }

    function findAllowed(id, imgurl, link, callback) {
        var data = {
            'action': 'find_allowed',
            'ig_post_id': id,
            'imgurl': imgurl,
            'link' : link
        };
        $.get(ajaxurl, data, function(response) {
            console.log('Got this from the server: ' + response);
            callback(response, data.ig_post_id, data.imgurl, data.link);
        });
    }

    function createFeed(igfeed){
        showingId = [];
        var igimgcount = 20;
        for (var i = igfeed.length - 1; i >= 0; i--) {
            if ( igimgcount <= 0 ) break;
            igimgcount--;
            if ( igfeed[i].images !== undefined ) { 
                var imgurl = igfeed[i].images.standard_resolution.url;
                $('.instagram-all').append("<div class='small-3 no-pad columns ig-image' style='position: relative;' id='"+ igfeed[i].id +"'><img src = '" + imgurl + "'></img></div>");

                findAllowed(igfeed[i].id, imgurl, igfeed[i].link, function(isAllowed, igid, imgurl, link){
                    if (isAllowed) {
                        console.log('allowed = '+isAllowed)
                        $('#'+igid).append("<span class='allowed-mark'>&#10004;</span>")
                        $('#'+igid).on("click",{id: igid, img: imgurl, link: link}, unallow); 
                    } else {
                        $('#'+igid).on("click",{id: igid, img: imgurl, link: link}, allow);
                    };
                });
            } else if ( igfeed[i].video !== undefined ) { console.log("video") };

        }
    }

    function paginate (pagenum) {
        $.ajax( {
            url: page[pagenum],
            type: 'GET',
            crossDomain: true,
            dataType: 'jsonp'
        }).done(function(res) {
            $('.instagram-all').empty();
            createFeed(res.data);

            function nextPage(){
                page[pagenum+1] = res.pagination.next_url;
                if (!res.pagination.next_url) {return};
                paginate(pagenum+1);
                console.log(page[pagenum+1]);
                nextButton.removeEventListener("click",nextPage, false);
                prevButton.removeEventListener("click",prevPage, false);
            }

            function prevPage(){
                if (pagenum == 0) {return};
                paginate(pagenum-1);
                console.log(page[pagenum-1])
                nextButton.removeEventListener("click",nextPage, false);
                prevButton.removeEventListener("click",prevPage, false);
            }

            console.log( res );                     
            prevButton.addEventListener("click", prevPage, false);
            nextButton.addEventListener("click", nextPage, false);

        }).fail(function(){
            alert('fail');
            prevButton.addEventListener("click", prevPage, false);
            nextButton.addEventListener("click", nextPage, false);
        });

    }


    $('.instagram-all').on('didLoadInstagram', function(event, response) {
        var initUrl = 'https://api.instagram.com/v1/tags/chulase/media/recent?client_id=77995f907c4348909e35165138fd2e62';
        page.push(initUrl);
        paginate(0)
    });

    $('.instagram-all').instagram({
        // hashtag
        hash: 'chulase',
        clientId: '77995f907c4348909e35165138fd2e62'
    });

</script>

<?php else: ?>
  <p>You do not have permission.</p>
<?php endif ?>

<?php endwhile; ?>
</div>
</div>