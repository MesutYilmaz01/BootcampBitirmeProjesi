function comment() {
    url = "";
    const token = localStorage.getItem("user-token")
    if (token == null)
    {
        url = "http://localhost/api/comments/comment"
    }
    else
    {
        url = "http://localhost/api/comments/comment?token="+token;
    }
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id')

    checkedValue = document.querySelector("#anonim:checked") == null ? false : true
    let data = {
        "id"        : id,
        "comment"   : $("#comment").val(),
        "anonim"    : checkedValue
    }
    $.ajax({
        type: "POST",
        url: url,
        dataType:"json",
        data: data,
        success: function (response) {
            if(response.result === true) 
            {
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-success" role="alert" id="alert">Yorumunuz başarı ile alındı.Onay bekliyor.</div>`;
                $("#error").append(message);
            } 
            else if(response.result === false) { 
                if (document.getElementById("alert") != null)
                {
                    document.getElementById("alert").remove();
                }
                message =  `<div class="alert alert-danger" role="alert" id="alert">Yorum gönderilemedi.</div>`;
                $("#error").append(message);
            }
        },
    })
}

function validateComment(){
    str = $("#comment").val()
    const token = localStorage.getItem("user-token")
    checkedValue = document.querySelector("#anonim:checked") == null ? false : true

    if (str.length < 1)
    {
        if (document.getElementById("alert") != null)
        {
            document.getElementById("alert").remove();
        }
        message =  `<div class="alert alert-danger" role="alert" id="alert">Yorum alanı boş olamaz.</div>`;
        $("#error").append(message);
    }
    else if (token == null && checkedValue == false)
    {
        if (document.getElementById("alert") != null)
        {
            document.getElementById("alert").remove();
        }
        message =  `<div class="alert alert-danger" role="alert" id="alert">Lütfen anonim yorum seçeneği seçiniz.</div>`;
        $("#error").append(message);
    }
    else
    {
        comment();
    }
}