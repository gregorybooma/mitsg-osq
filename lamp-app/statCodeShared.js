$('.rateImg').live('click',function() {
  var currImg = $(this).attr('src');
  var currRow = $(this).parent();
  var op = "";
  currImg = currImg.substring(currImg.lastIndexOf('/')+1,currImg.length);
  if(currImg=="iconThumbsup.png") {
    op="voteup";
  } else if(currImg=="iconThumbsdown.png") {
    op="votedown";
  }
  var dataString = 'Question='+ $(this).attr('rel')+'&op=' + op;
  $.ajax({
    type: "POST",
    url: "vote.php",
    data: dataString,
    cache: false,
    success: function(msg) {
      // TO-DO:  SWAP IMAGES IN CURRENT ROW TO DISABLED STATUS
      $(currRow).html("Vote Received!");
    }
  });
});