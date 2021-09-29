function ChangeStyle(){
    $('.txt').css("border: none");
    $('.txt').click(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
               .attr('placeholder','');
     }).empty(function(){
        $(this).attr('placeholder',$(this).data('placeholder'));
     });

}
// implement the search bar
function dict(e){
    if(e.keyCode == 13){
    var x = document.getElementById('txt').value;
    const url="https://www.google.com/search?q=";
    var url1 = url+x;
    var win =window.open(url1, '_blank');
    win.focus;
    }
}
 $(document).scroll(function(){
    var height = $(".navbar").height();
    if($(this).scrollTop() > height){
        $('.navbar').css("background-color","rgb(90, 4, 21)");
        $('.navbar').css("padding: 30px, 0");
    }
    else{
        $('.navbar').css("background-color", "rgb(9, 49, 4)");
    }
 });
