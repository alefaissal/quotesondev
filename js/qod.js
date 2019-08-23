(function ($) {
    $(function () {
        let lastPage = '';

        //1. Get request for wp/v2/posts
        $('#new-quote-button').on('click', function (event) {
            event.preventDefault();
            lastPage = document.URL;
            $.ajax({
                method: 'get',
                url: qod_api.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
            }).done(function (data) {
                const post = data[0];
                console.log(post);
                updateQuoteHtml(data);

                //get slug
                const slug = post.slug;

                //add url with home url and slug
                const url = qod_api.home_url + '/' + slug + '/';

                //update browser url with history.pushState()
                history.pushState(null, null, url);

            }).fail(function (err) {
                console.log('error', err);

            });
        });

        // Add history api postate for forward and back buttons in the browser
        $(window).on('popstate', function(){
            window.location.replace(lastPage);

        });


        function updateQuoteHtml(data) {


            const post = data[0];

            console.log('post', post);

            const quoteSrcUrl = post._qod_quote_source_url;
            const quoteSrc = post._qod_quote_source;
            const postAuthor = post.title.rendered;
            const portAuthorLink = post.link;
            const postContent = post.content.rendered;


            console.log('url source ' + quoteSrcUrl);
            console.log('source ' + quoteSrc);

            $('.front-page-author-name').html('--' + postAuthor + ',');
            $('.front-page-text').html(postContent);

            if ((quoteSrc.length > 0) && (quoteSrcUrl.length > 0)) {
                $('.front-page-author-link').html(
                    '<h2 class="entry-title">' +
                    '<a href="' + quoteSrcUrl + '" rel="bookmark">' +
                    quoteSrc + '</a></h2>'
                );
            } else if (quoteSrc.length > 0) {
                $('.front-page-author-link').html(
                    '<h2 class="entry-title">' +
                    quoteSrc + '</h2>'
                );
            } else if (quoteSrcUrl.length > 0) {
                $('.front-page-author-link').html(
                    '<h2 class="entry-title">' +
                    '<a href="' + quoteSrcUrl + '" rel="bookmark">@' +
                    postAuthor + '</a></h2>'
                );
            } else {
                $('.front-page-author-link').html(
                    '<span></span>');
            }
        }


        //2. Post Request for wp/v2/posts

        $('#quote-submission-form').on('submit', function (event) {
            event.preventDefault();
            const $quoteAuthor = $('#quote-author').val();
            const $quoteContent = $('#quote-content').val();
            const $quoteSource = $('#quote-source').val();
            const $quoteSourceUrl = $('#quote-source-url').val();
            $.ajax({
                method: 'post',
                url: qod_api.rest_url + 'wp/v2/posts/',
                data: {
                    title: $quoteAuthor,
                    content: $quoteContent,
                    _qod_quote_source: $quoteSource,
                    _qod_quote_source_url: $quoteSourceUrl,
                    comment_status: 'closed'

                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', qod_api.wpapi_nonce);
                }
            }).done(function (response) {
                //finish this
                console.log(response);
                // $('#quote-author').val('');
                // $('#quote-content').val('');
                // $('#quote-source').val('');
                // $('#quote-source-url').val('');
                alert('Quote submitted');
                
                //Code to send to another page when clicked
                $('#quote-submited').html('<p class="quote-received">Thanks, your quote submission was received</p>');
                

            }).fail(function (err) {
                console.log('error', err);
                alert('Something went wrong, try again later.');
            });
        });



    });//end of doc ready
})(jQuery);