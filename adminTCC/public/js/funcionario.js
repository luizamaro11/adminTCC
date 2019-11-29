// documentação javascript
$(document).ready(function (){
           
    retornaFuncionario();
             
});
         
function retornaFuncionario(){
             
    $.ajax({
        url:'php_action/listaFuncionario.php',
        type:'POST',
        success: (data) => {
                         
            let funcionario = JSON.parse(data);
            let linhaFuncionario;
            let contadorFuncionario = 0;
                             
            while (contadorFuncionario < funcionario.length){
                                 
                linhaFuncionario += `
                    <tr>
                        <th scope="row">${funcionario[contadorFuncionario].nm_usuario}</th>
                        <th>${funcionario[contadorFuncionario].n_celular}</th>
                        <th>${funcionario[contadorFuncionario].ds_email}</th>
                        <td>
                            <button class="btn-block btn-warning">ALTERAR</button>
                            <button class="btn-block btn-info">EXCLUIR</button>
                        </td>
                    </tr>`;
                                 
                contadorFuncionario++;
                                 
            }
                             
            document.querySelector("#listarFuncionarios").innerHTML = linhaFuncionario;
                           
        } 
    });
}