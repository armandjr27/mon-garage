// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  const image = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(image);
});

const addShadow = (className) => {
  $(className).hover(function () {
    $(this).addClass('shadow')
  }, function () {
    $(this).removeClass('shadow')
  });
}

$(document).ready(function () {

  addShadow('.card');
  addShadow('.table');

});
