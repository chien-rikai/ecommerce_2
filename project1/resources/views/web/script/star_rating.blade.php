<script src="/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){  
            var starRating = "{{$product->star_rating}}";
            var starRatingHtml = "";
            for(var i = 0; i<5; i++){
                if(i < starRating){
                    starRatingHtml+="<li><i class='fa fa-star'></i></li>"
                }else{
                    starRatingHtml+="<li class='no-star'><i class='fa fa-star'></i></li>"
                }
            }
            starRatingHtml+="<li><a  id='btn-review'>"+"{{$product->review}} "+"{{__('lang.review')}}"+"</a></li>"
            $("#starRating").append(starRatingHtml);
    });
</script>
<script>
$(document).ready(function(){
  $("#btn-review").click(function(){
    $("#myModal").modal();
  });
});
</script>
<script>
    function Review(star){
      console.log(star);
      $.ajax({
        url: "/web.com/review/"+star,
        type: "GET",
      }).done(function(response){
        $("#review-star").empty();
				$("#review-star").html(response);
      });
    }
</script>