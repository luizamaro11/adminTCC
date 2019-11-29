let numeroMesa = document.querySelector("#numeroMesa");
let btnSalvar = document.querySelector("#salvar");
        
btnSalvar.addEventListener('click', function() {
            
    $.ajax({
        url:'php_action/createMesa.php',
        type:'POST',
        data: {objNumeroMesa: numeroMesa.value},
        success: (data) => {
                
            if(data == 1){
                   
                retornaMesas();
                   
            } else {
                    
                alert('Falha ao Cadastrar o Número da Mesa');
                    
            }
                
        }
    });
            
});
        
$(document).ready(function (){
           
    retornaMesas();
            
});
        
function retornaMesas(){
            
    $.ajax({
        url:'php_action/listarMesa.php',
        type:'POST',
        success: (data) => {
                        
            let mesas = JSON.parse(data);
            let linhaNumeroMesa;
            let contadorMesa = 0;
                            
            while (contadorMesa < mesas.length){
                                
                linhaNumeroMesa += `
                    <tr>
                        <th scope="row" style="color: inherit; font-size: 20px;">Mesa ${mesas[contadorMesa].nrMesa}
                        </th>
                        <td>
                            <button id="${mesas[contadorMesa].cdMesa}" onclick="deletaMesa(${mesas[contadorMesa].cdMesa})" class="btn-block btn-info">EXCLUIR</button>
                        </td>
                    </tr>`;
                                
                contadorMesa++;
                                
            }
                            
            document.querySelector("#listarMesas").innerHTML = linhaNumeroMesa;
                          
        } 
            
    });
            
}
        
function deletaMesa(numeroMesa){
            
    $.ajax({
        url:'php_action/deleteMesa.php',
        type:'POST',
        data: {numeroMesa:numeroMesa},
        success: (data) => {
                
            if(data == 1){
                    
                alert("Mesa excluída com sucesso");
                retornaMesas();
            } else {
                    
                alert("Falha ao excluir uma mesa");
                    
            }
                
        }
    });
            
}
