var numPostsAvailable = -1;
var isLoading = false;
var projectSection = $("section[data-menu-item=\"projekte\"] .inner");

var renderNewItems = function(items) {
  items.map(function(item) {
    var imagesMarkup = '<div class="image-crop">';

    item.images.map(function(image) {
      imagesMarkup += '<img src="' + image.src + '" ' +
        'alt="' + image.alt + '"/>';
    });
    imagesMarkup += '</div>';

    $('<article project-id="' + item.id + '">' +
      '<a href="' + item.permalink + '">' +
      imagesMarkup +
      '<h4>' + item.title + '</h4>' +
      '<p>' + item.excerpt + '</p>' +
      '</a></article>'
    ).appendTo(projectSection);
  });
};

$(window).scroll(function(evt) {
  var projectSectionBottom = projectSection.innerHeight() + projectSection.offset().top;
  var winHeight = $(window).innerHeight();
  var scroll = $(window).scrollTop();
  var itemsPerLoad = 5;

  if((scroll + (winHeight + 20) >= projectSectionBottom) &&
    !isLoading) {
    var projectsPresent = $("article[project-id]").length;
    var offset = projectsPresent;
    isLoading = true;

    projectSection.append('<div class="loading">Lade mehr projekte...</div>');

    window.setTimeout(
        function() {
          if(numPostsAvailable === -1 || numPostsAvailable > projectsPresent) {
            $.ajax({
              dataType: "json",
              url: '/category/projekte',
              data: 'items=' + itemsPerLoad + '&offset=' + offset,
              success: function (data) {
                numPostsAvailable = data['total-items'];
                if (data['items'] > 0) {
                  renderNewItems(data['data']);
                }
                isLoading = false;
                $('.loading').remove();
              }
            });
          } else {
            $('.loading').remove();
          }
        },
        500
    );


  }

});
