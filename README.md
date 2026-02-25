Fizemos uma Dashboard onde a todos os gerenciamentos (usuários, grupos, seleções e jogos) com o CRUD, implementando o padrão MVC e POO (Progamaçao Orientada a Obejtos).
A tabela classificações é usada para gerenciar a pontuação das seleções após a finalização de um jogo, a pontuação dependendo se ganhar, empatar ou perder a partida será acrescentado na pontuação (Vitória = 3 ; Empate = 1 ponto para cada ; Derrota = 1).
Foi utilizado Inner Join(Ela utiliza o id da tabela que entregará a informação para buscar dentro dela a informação da coluna)  para usar informações de outras tabelas como a tabela grupos para as seleções, classificação e jogos.
Foi utilizado a condição 'try' e a 'catch' para quando ocorrer de cadastrar ou editar algo com a mesma informação que outra coluna ela não ira aparecer a mensagem de erro do banco de dados e ira retornar a mensagem que já existe no banco de dados, esse erro ocorre em colunas que tem categoria de unique (exista apenas uma coluna com aquela descrição) 
Gabriel Machado Cavalcante - https://github.com/anonimatogb
Dhiogo Antonio Marestoni - https://github.com/Dhiogo-Antonio
Vitor Hugo Espirito Santo - https://github.com/VitorSanto-ux
