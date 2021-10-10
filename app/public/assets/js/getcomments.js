function getComments(){
    //Comments
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get('id')
    $.ajax({
        type: "POST",
        url: "http://localhost/api/comments/getcomments",
        dataType:"json",
        data: {"id" : id},
        success: function (response) {
            if(response.result === true) { 
                response.data.comments.map((item) => {
                    string = `           
                            <div class="col-12 mt-2">
                            <div class="card border-dark mb-3">
                            <div class="card-header"><h6>${item.name} ${item.surname}</h6></div>
                            <div class="card-body text-dark">
                                <p class="card-text">${item.comment}</p>
                                <p class="card-text"><h6 style="float:right;">${item.created}</h6></p>
                            </div>
                            </div>
                            </div>
                            `;
                        $("#commentside").append(string);    
                });
            } 
            else if(response.result === false) 
            { 
                    $("#commentside").append("Gösterilecek yorum bulunamadı..");
            }
            
        }
    })
}
    $(document).ready(function(){
        getComments();
    })
    