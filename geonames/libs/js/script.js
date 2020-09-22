$(window).on("load", function () {
  if ($(".loader").length) {
    $(".loader")
      .delay(300)
      .fadeOut("slow", function () {
        $(this).remove();
      });
  }
});


$("#btn-run").click(function () {
  if($('#placeInput').val() == ''){
    alert('Input can not be left blank');
  } 
  else {
  $.ajax({
    url: "libs/php/getWiki.php",
    type: "POST",
    datatype: "json",
    data: {
      place: $("#placeInput").val().split(" ").join(""),
    },
    success: function (result) {
      console.log(result);

      if (result.status.code == "200") {
        $("#txtTitle-1").html(result["data"]["0"]["title"]);
        $("#txtSummary-1").html(result["data"]["0"]["summary"]);
        $("#txtWikipedia-1").html(result["data"]["0"]["wikipediaUrl"]);
        $("#txtFeature-1").html(result["data"]["0"]["feature"]);
        $("#txtCountryCode-1").html(result["data"]["0"]["countryCode"]);

        $("#txtTitle-2").html(result["data"]["1"]["title"]);
        $("#txtSummary-2").html(result["data"]["1"]["summary"]);
        $("#txtWikipedia-2").html(result["data"]["1"]["wikipediaUrl"]);
        $("#txtFeature-2").html(result["data"]["1"]["feature"]);
        $("#txtCountryCode-2").html(result["data"]["1"]["countryCode"]);

        $("#txtTitle-3").html(result["data"]["2"]["title"]);
        $("#txtSummary-3").html(result["data"]["2"]["summary"]);
        $("#txtWikipedia-3").html(result["data"]["2"]["wikipediaUrl"]);
        $("#txtFeature-3").html(result["data"]["2"]["feature"]);
        $("#txtCountryCode-3").html(result["data"]["2"]["countryCode"]);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {},
  });
}});
