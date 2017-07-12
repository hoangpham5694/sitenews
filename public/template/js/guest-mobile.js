$(document).ready(function()
{
  $('#pollSlider-button').click(function() {
    if($(this).css("margin-left") == "200px")
    {
        $('.pollSlider').animate({"margin-left": '-=200'});
        $('#pollSlider-button').animate({"margin-left": '-=200'});
    }
    else
    {
        $('.pollSlider').animate({"margin-left": '+=200'});
        $('#pollSlider-button').animate({"margin-left": '+=200'});
    }


  });
 });     