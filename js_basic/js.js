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

var user = {
   name: "ali",
   family: "Khorandfard",
   age: 20,
   my_arr: ["b1","b2","b3"],
   second :  {
      name: "Roy",
      family: "Faust",
      ar_in_obj: ["jlkajdlkadl"]
   }
}

var array_objects = [user,user,user,33];



window.alert(array_objects[3]);

$(document).ready(function() {
   $("#project_one").hide();
   $("#btn_show_hide").on("click",function(){
      $("#project_one").toggle("medium");
   });
});




 
