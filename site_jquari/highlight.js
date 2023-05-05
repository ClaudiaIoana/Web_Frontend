let prev = null;

$(document).ready(function() {
    $('body').on('dblclick', function() {
        let selectedWord = $.trim(window.getSelection().toString());
        $("body").find(".highlight").removeClass("highlight");
        if (selectedWord.length > 0) {
            $('body').each(function() {
                let html = $(this).html();
                let replacedHtml = html.replace(new RegExp(selectedWord, 'g'), '<span class="highlight">' +
                    selectedWord + '</span>');
                $(this).html(replacedHtml);

                prev = selectedWord;
            });
        }
    });
});

