$(function(){
    $("#test-input").on('input', function(e){
        this.value = this.value.replace(/[^0-9\.]/g, '');
        this.value = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    });
    $("#test-form").on('submit', function(e){
        e.preventDefault();
        var test = $("#test-input").val();
        test = test.replace(/\s+/g, '');;
        var data = {
            'test': test
        };

        $.ajax({
            url: "test.php",
            type: "POST",
            data: data,
            dataType: 'json',
            success: function(data){
                if (!data.success){
                    console.log("Server error")
                }
                else{
                    console.log("Success")
                }
            }
        });
    });
});