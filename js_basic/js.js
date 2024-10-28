function my_func(){
    /*var my_text = "hello js world";
    var my_second_text ="it is ma world";
    var my_text = my_text + " it is my world";
    var my_int = 300;
    my_int = my_int + 100;
 
    my_int= my_int + my_text;


    window.alert(my_int);
    */

    var my_text = document.getElementById("my_input").value;
    window.alert(my_text);

 
 }


 function my_add(){
    var first_number = document.getElementById("first_number").value;
    first_number = parseInt(first_number);
    // parseFloat() function ist auch verhanden
    var second_number = document.getElementById("second_number").value;
    second_number = parseInt(second_number);
    window.alert(first_number+second_number);
 }
 function my_minus(){
    var first_number = document.getElementById("first_number").value;
    first_number = parseInt(first_number);
    // parseFloat() function ist auch verhanden
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
