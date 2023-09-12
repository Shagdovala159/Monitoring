$(function () {
  $(".js-check-all").on("click", function () {
    if ($(this).prop("checked")) {
      $('th input[type="checkbox"]').each(function () {
        $(this).prop("checked", true);
      });
    } else {
      $('th input[type="checkbox"]').each(function () {
        $(this).prop("checked", false);
      });
    }
  });
});

// Get the modal

function deployModal(row_id) {
  var modal = document.getElementById("a" + row_id);

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById(row_id);
  var modalImg = document.getElementById("b" + row_id);
  modal.style.display = "block";
  modalImg.src = img.src;

  var span = document.getElementById("d" + row_id);

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  };
}

// Get the <span> element that closes the modal
