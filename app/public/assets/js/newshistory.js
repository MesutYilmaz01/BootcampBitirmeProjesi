function newHistory(){
    //Haberler
    const token = localStorage.getItem("user-token");
    $.ajax({
        type: "GET",
        url: "http://localhost/api/news/newhistory?token="+token,
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) {  
            response.data.news.map((item,i) => {
                string = `           
                        <tr>
                            <th scope="row">${i+1}</th>
                                <td><a href="/main/detail/newdetail?id=${item.id}">${item.title.substring(0,40)+"..."}</a></td>
                                <td>${item.created}</td>
                        </tr>
                        `;
                    $("#body").append(string);
            });
                } 
                else if(response.result === false) { 
                    $("#body").append("Gösterilecek geçmiş haber bulunamadı..");
                }
            }
        })
    }
    $(document).ready(function(){
        newHistory();
    })
    