<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
$('#next').click(console.log('next'));
</script>
<section class="page-content bg-handmouse">
<div class="small-12 large-offset-1 large-10 paper-like-content-wrapper">

  <?php while (have_posts()) : the_post(); ?>

  	 <div class="cover-title">
    <?php get_template_part('templates/page', 'header'); ?>
    </div>

    <?php if (is_user_logged_in()): ?>
    <section style="display:inline-block">
    <div class="rows" data-equalizer>
        <section id="instragram" class="small-12 large-8 columns no-pad" data-equalizer-watch style="padding-right:3px">
            <div class="no-pad section-title section-title-instragram">
                <span class="section-title-pad">All</span>
                <div style="float: right; margin-top:-1.5px; margin-bottom:-10px; margin-right: 5px;">
                    <button class="button" id="prev">prev</button>
                    <button class="button" id="next">next</button>
                </div>
            </div>
            <div class="instagram-all"></div>
        </section>
        <section id="instragram" class="small-12 large-4 columns no-pad" data-equalizer-watch>
            <div class="no-pad section-title section-title-instragram">
                <span class="section-title-pad">Showing</span>
            </div>
            <div class="instagram"></div>
        </section>
    </div>
    </section>

        <script type="text/javascript">
            var prevButton = document.getElementById("prev");
            var nextButton = document.getElementById("next");
            var page = [];

            // this section is only for test purpose
            // ===== BEGIN =====
            //! jQuery Instagram - v0.3.1 - 2014-06-19
            !function(a){function b(b){var c="https://api.instagram.com/v1",d={};if(null==b.accessToken&&null==b.clientId)throw"You must provide an access token or a client id";if(d=a.extend(d,{access_token:b.accessToken||"",client_id:b.clientId||"",count:b.count||""}),null!=b.url)c=b.url;else if(null!=b.hash)c+="/tags/"+b.hash+"/media/recent";else if(null!=b.search)c+="/media/search",d=a.extend(d,b.search);else if(null!=b.userId){if(null==b.accessToken)throw"You must provide an access token";c+="/users/"+b.userId+"/media/recent"}else null!=b.location?(c+="/locations/"+b.location.id+"/media/recent",delete b.location.id,d=a.extend(d,b.location)):c+="/media/popular";return{url:c,data:d}}a.fn.instagram=function(c){var d=this;c=a.extend({},a.fn.instagram.defaults,c);var e=b(c);return a.ajax({dataType:"jsonp",url:e.url,data:e.data,success:function(a){d.trigger("didLoadInstagram",a)}}),this.trigger("willLoadInstagram",c),this},a.fn.instagram.defaults={accessToken:null,clientId:null,count:null,url:null,hash:null,userId:null,location:null,search:null}}(jQuery);
            // ====== END ======

            function createFeed(igfeed){
                var igimgcount = 20;
                for (var i = igfeed.length - 1; i >= 0; i--) {
                  if ( igimgcount <= 0 ) break;
                  igimgcount--;
                    if ( igfeed[i].images !== undefined ) { 
                      var imgurl = igfeed[i].images.standard_resolution.url;
                      $('.instagram-all').append("<img class='small-3 no-pad' id='"+ igfeed[i].id +"' src = '" + imgurl + "'></img>")
                    }
                    else if ( igfeed[i].video !== undefined ) console.log("video");
                };
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
                    prevButton.addEventListener("click", function(){
                      paginate(currentUrl)
                    });
                    
                    prevButton.addEventListener("click", prevPage, false);
                    nextButton.addEventListener("click", nextPage, false);

                });


            }

            

            $('.instagram-all').on('didLoadInstagram', function(event, response) {
              var initUrl = 'https://api.instagram.com/v1/tags/chula/media/recent?client_id=77995f907c4348909e35165138fd2e62';
              page.push(initUrl);
              var next = response.pagination.next_url;
              var igfeed = response.data;
              createFeed(igfeed);
              paginate(0)

            });
            $('.instagram-all').instagram({
              // hashtag
              hash: 'chula',
              clientId: '77995f907c4348909e35165138fd2e62'
            });

            $('.instagram').on('didLoadInstagram', function(event, response) {
              var igfeed = response.data;
              var igimgcount = 6;
              for (var i = igfeed.length - 1; i >= 0; i--) {
                if ( igimgcount <= 0 ) break;
                igimgcount--;
                  if ( igfeed[i].images !== undefined ) { 
                    var imgurl = igfeed[i].images.standard_resolution.url;
                    // console.log("image");
                    // console.log(igfeed[i].link + " / " +imgurl);

                    $('.instagram').append("<a href='" + igfeed[i].link + "' target='_blank'><img class='small-6 no-pad' id='"+ igfeed[i].id +"' src = '" + imgurl + "'></img></a>")
                  }
                  else if ( igfeed[i].video !== undefined ) console.log("video");
              };
            });
            $('.instagram').instagram({
              // hashtag
              hash: 'chula',
              clientId: '77995f907c4348909e35165138fd2e62'
            });
        </script>

    <?php else: ?>
    	<p>You do not have permission.</p>
	<?php endif ?>

  <?php endwhile; ?>
  </div>
</div>