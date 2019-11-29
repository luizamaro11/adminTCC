
let nomeProduto = document.querySelector("#nomeProduto");
let quantidadeProduto = document.querySelector("#quantidadeProduto");
let valorProduto = document.querySelector("#valorProduto");
let tipoUnidadeProduto = document.querySelector("#tipoUnidadeProduto");
let btnSalvar = document.querySelector("#salvarProduto");
        
btnSalvar.addEventListener('click', event => {
           
    $.ajax({
        url:'php_action/createProduto.php',
        type:'POST',
        data: {
            objNomeProduto: nomeProduto.value,
            objQuantidadeProduto: quantidadeProduto.value,
            objValorProduto: valorProduto.value,
            objTipoUnidadeProduto: tipoUnidadeProduto.selectedOptions[0].value
        },

        success: (data) => {
                
            if(data == 1){
                   
                alert('Produto Cadastrado com Sucesso');
                retornaProdutos();
                   
            } else {
                    
                alert('Falha ao Cadastrar o produto');
                    
            }
                
        }
    });
            
});
  
$(document).ready(function (){
           
    retornaProdutos();
            
});
        
function retornaProdutos(){
            
    $.ajax({
        url:'php_action/listarProdutos.php',
        type:'POST',
        success: (data) => {
                        
            let produtos = JSON.parse(data);
            let linhaProduto;
            let contadorProduto = 0;
                            
            while (contadorProduto < produtos.length){
                                
                linhaProduto += `
                    <tr id="th${produtos[contadorProduto].cd_produto}">
						<th scope="row">${produtos[contadorProduto].nm_produto}</th>
						<th>${(produtos[contadorProduto].qtd_produto == null) ? 0 : produtos[contadorProduto].qtd_produto}</th>
						<th>${produtos[contadorProduto].tp_produto}</th>
						<th>R$ ${produtos[contadorProduto].vl_produto}</th>
						<td>
							<button class="btn-block btn-warning" id="listarUmProduto" data-toggle="modal" data-target="#alterarProduto">ALTERAR</button>
						</td>
					</tr>`;
                                
                contadorProduto++;
                                
            }
                            
            document.querySelector("#listaProdutos").innerHTML = linhaProduto;
                          
        } 
            
    });       
}

$(document).on("click", "#listarUmProduto", function(){
    $.ajax({
        url:'php_action/listarUmProduto.php',
        type:'POST',
        data: {codigoProduto: $("#listarUmProduto").val()},
        dataType: 'json',
        success: function(data){
            $("#altNomeProduto").val(data.produtos.nomeProduto);
            $("#altQuantidadeProduto").val(data.produtos.quantidadeProduto);
            $("#altValorProduto").val(data.produtos.valorProduto);
            $("#altTipoUnidadeProduto").val(data.produtos.tipoUnidadeProduto);
                               
        }        
    });
});

function alterarProdutos(codigoProduto){
        
    $.ajax({
        url:'php_action/alterarProdutos.php',
        type:'POST',
        data: {codigoProduto: codigoProduto},
        success: (data) => {
                
            if(data == 1){
                    
                alert("produto alterado com sucesso");
                retornaProdutos();
                    
            } else {
                    
                alert("Falha ao alterar as informações do produto");
                    
            }
                
        }
    });
            
}


    /*document.querySelector("#listarUmProduto").addEventListener('click', event => {
        
        let tr = document.querySelector('#th1');
        let altNomeProduto = document.querySelector('#altNomeProduto').value;
        let altQuantidadeProduto = document.querySelector("#altQuantidadeProduto").value;
        let altValorProduto = document.querySelector("#altValorProduto").value;
        let altTipoUnidadeProduto = document.querySelector("#altTipoUnidadeProduto").children;
        
        valoresFilhosTr = tr.children;
        
        altNomeProduto = valoresFilhosTr[0].innerText;
        altQuantidadeProduto = valoresFilhosTr[1].innerText;
        altValorProduto = valoresFilhosTr[3].innerText;
       
       [...altTipoUnidadeProduto].forEach(opcao =>{
           
           if(valoresFilhosTr[2].innerText == opcao.innerText){
               
               opcao.selected = true;
               
           }
            
        });
        
    });*/