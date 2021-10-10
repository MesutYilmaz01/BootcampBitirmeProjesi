function commentHistory(){
    //Comments
    const token = localStorage.getItem("user-token")
    $.ajax({
        type: "POST",
        url: "http://localhost/api/comments/getcommenthistory?token="+token,
        dataType:"json",
        // data: 
        success: function (response) {
            if(response.result === true) { 
                response.data.comments.map((item,i) => {
                    string = `           
                            <tr>
                            <th scope="row">${i+1}</th>
                            <td><a href="/main/detail/newdetail?id=${item.new_id}">${item.comment}</a></td>
                            <td>${item.created}</td>
                            </tr>
                            <tr>
                            `;
                        $("#comments").append(string);    
                });
            } 
            else if(response.result === false) 
            { 
                    $("#comments").append("Gösterilecek yorum bulunamadı..");
            }
            
        }
    })
}
    $(document).ready(function(){
        commentHistory();
    })
    