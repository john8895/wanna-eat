$(function (){
    $('#menuBtn').on('click',()=>{
        $('#navbarHeader').addClass('show')
        $('.sidebar-layout').addClass('show')
    })
    $('.sidebar-layout').on('click',()=>{
        $('.sidebar-layout').removeClass('show')
        $('#navbarHeader').removeClass('show')
    })
})