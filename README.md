# Vaniator


O script busca as informações dos cnpj que estiverem dentro do txt "CNPJ_SC.txt", separados por quebra de linha,
e os grava em um arquivo json ou no mongodb.

O script sem o mongo é bem simples, basta ligar o xampp e deixar rodar o index.
ja com o mongo vai ser necessario instalar o banco local e configurar o php.ini e dependecias.

Lembrando que escrevi esse script a meses atras, e por isso o proxys provavelmente estão mortos :P,
para um uso 100% seria necessario que o usuario colocasse novos proxys no array do index.php, mas sempre deixando a pos [0] vazia.

É necessario modificar os seguintes atributos no php.ini:

memory_limit=-1
max_execution_time=7000 (depende da quantidade de CNPJ e proxys a serem usados)
