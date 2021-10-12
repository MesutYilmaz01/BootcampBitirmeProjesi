function categoriesFetch(){
    //Kategoriler
    $.ajax({
        type: "GET",
        url: "http://localhost/api/categories/getcategories",
        dataType:"json",
        //data: dataString,
        success: function (response) {
            if(response.result === true) {  
            response.data.categories.map((item) => {
                string = `           
                        <li class="nav-item" style="margin-left: 30px;">
                            <a class="nav-link active" aria-current="page" href="/main/category/categoryresult?id=${item.id}"><h6>${item.category}</h6></a>
                        </li>
                        `;
                    $("#categories").append(string);
            });
                } 
                else if(response.result === false) { 
                    $("#categories").append("Gösterilecek kategori bulunamadı..");
                }
            }
        })
    }
    $(document).ready(function(){
        categoriesFetch();
    })
    