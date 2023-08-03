function validaCPF($cpf){

   $verificaJ = $cpf[9];
   $verificaK = $cpf[10];
   
   $J_letra = 10;
   $J_array = [];
   $J_soma = 0;
   for ($i = 0; $i <= 8; $i++){
       $J_array.push($cpf[$i] * $J_letra);
       $J_letra--;
       $J_soma = $J_soma + $J_array[$i];
   }
   
   $J_resto = $J_soma % 11;
   $J_subtracao = 11 - $J_resto;
   
   if ($J_subtracao > 9) {
       $J = 0;
   } else {
       $J = $J_subtracao;
   }
   
   //Conseguindo K
   $K_letra = 11;
   $K_array = [];
   $K_soma = 0;
   for ($ii = 0; $ii <= 9; $ii++){
       $K_array.push($cpf[$ii] * $K_letra);
       $K_letra--;
       $K_soma = $K_soma + $K_array[$ii];
   }
   
   $K_resto = $K_soma % 11;
   $K_subtracao = 11 - $K_resto;
   if ($K_subtracao > 9) {
       $K = 0;
   
   } else {
       $K = $K_subtracao;
   
   }
   
   if ($verificaJ == $J && $verificaK == $K){
      return $cpf+": CPF VÁLIDO";
   } else {
     alert("CPF inválido!");
   }
}