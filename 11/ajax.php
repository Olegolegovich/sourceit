<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.post("question_output.php",{ },
        function(category,answer){
            alert("category " + "\nanswear ");
        });
    });
});
</script>
</head>
<body>

<button>Send an HTTP POST </button>

</body>
</html>