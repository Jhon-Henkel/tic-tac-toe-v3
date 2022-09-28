# Jogo da velha Versão 3
Nesta versão, temos uma repaginada no visual, organização de código, armazenamento de informações via banco de dados.

O intuito desse projeto foi aprimorar os conhecimentos em Javascript, AngularJs e Bootstrap principalmente, que são as ferramentas que utilizo no meu serviço e tinha dificuldade. 
Desenvolvi esse projeto utilizando HTML, CSS e JavaScript no frontend, e no backend utilizei PHP e My SQL. Como o foco desse projeto era conhecer um pouco melhor o Bootstrap e 
aprimorar as minhas skills em JS, utilizei como framework's o Bootstrap e o AngularJS.

Desenvolvi nesse game com opção de um ou dois jogadores, três opções de dificuldade de jogo no modo single player, sendo:
- Fácil: Essa dificuldade é totalmente randômica, sem estratégias de defesa ou ataque elaborado.
- Média: Aqui, as jogadas já são mais estratégicas, sempre antes de jogar uma sequência estratégica, o sistema de defesa irá tentar te impedir de ganhar.
- Difícil: Por aqui as jogadas ja são bem mais estratégicas, tendo o mesmo sistema de defesa da dificuldade média, porem antes de se defender, ele vai validar se ele consegue ganhar. 
Caso não consiga ganhar, vai ver se consegue se defender, se não tiver jogadas de defesa, cairá em uma sequência lógica.

Em uma versão futura, pretendo colocar testes unitários, rotas do backend pelo Slim, melhorar a inteligência artificial, colocar os alerts em JS para modais e opção multi-player 
via rede.

# Como usar:
- Para criar a base de dados e as tabelas necessárias tem um arquivo com as queries em <strong>alters/alters.sql</strong> onde você pode copiar as queries e executar em seu bando de dados.
- Alterar o valor das constantes relacionadas ao banco de dados contidas no arquivo <strong>config.php</strong> na raiz desse projeto.
- Alterar o caminho do seu diretório em <strong>assets/js/config/configs.js</strong>
- Rodar os comandos <strong>composer update</strong> e <strong>npm update</strong> na pasta do projeto para atualizar as bibliotecas.
- Para rodar os testes, usar o comando <strong>karma start</strong> na raiz do projeto.

# Quer ver funcionando?
Basta clicar <a target="_blank" href="http://tictactoe.jhonhenkel.kinghost.net/">aqui</a>.

# Principais bibliotecas
- AngularJS Routes
- Font-awesome
- Bootstrap 5
- AngularJS
- Jasmine
- Karma
- Kint
