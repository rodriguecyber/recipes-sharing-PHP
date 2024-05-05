$(document).ready(()=>{
    // integarting server with signup page
    $('#resgister').click(()=>{
        event.preventDefault();
        try{
        let userData = $('#registerForm').serialize()
        $.ajax({
            type:'POST',
            url:"../server/register.php",
            data:userData,
            success:(response)=>{
                alert(response)
            }
        })
    }
    catch(err){
        console(err)
    }
    })
    // function for integrating login form with server
    $('#login').click(()=>{
        event.preventDefault()
        
            try{
            let userData=$('#loginForm').serialize()
            $.ajax({
                type:'POST',
                url:'../server/login.php',
                data:userData,
                success:(response)=>{
                   
                if(response==='Logged in'){
                    window.location='../admin/profile.php'
                    // alert('done')
                }
                else{
                alert(response)
            }
                }

                
            })
        }
        catch(error){
            console.log(error)
        }
    })
    // integration for creating new recipe
    $('#newRecipe').click(() => { // Add 'event' parameter here
        event.preventDefault(); // Prevent default form submission behavior
        var formData = new FormData($('#newRecipeForm')[0]);
    
        $.ajax({
            url: '../server/newRecipe.php', // URL of your PHP script
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response); // Handle success response
            },
            error: function(xhr, status, error) {
                console.error(error); // Handle error
            }
        });
    });
    

})
