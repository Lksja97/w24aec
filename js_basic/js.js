function my_add(){
   var first_number = document.getElementById("first_number").value;
   first_number = parseInt(first_number);
   var second_number = document.getElementById("second_number").value;
   second_number = parseInt(second_number);
   window.alert(first_number+second_number);
}
function my_minus(){
   var first_number = document.getElementById("first_number").value;
   first_number = parseInt(first_number);
   var second_number = document.getElementById("second_number").value;
   second_number = parseInt(second_number);
   window.alert(first_number - second_number);

}
function my_multiple(){
   window.alert("my_multiple");

}
function my_divide(){
   window.alert("my_divide");

}


$( document ).ready(function() {
   $("#project_one").hide();
   $("#btn_show_hide").on("click",function(){
      $("#project_one").toggle("medium");
   });
});




 
