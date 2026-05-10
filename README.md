# LojaVirtual-Codifica2025-Grupo1
Desenvolvedores:
- Rodrigo Inocente Correia
- Sara Elisa Carias da Silva Coser
- Leticia Morais Ferreira
- Davi Marques Souza

# 🛒 Loja Virtual - Codifica2025

Sistema de loja virtual desenvolvido em Laravel (PHP).  
O projeto foi criado com foco na interação do usuário com a plataforma, permitindo navegação intuitiva, autenticação com diferentes níveis de acesso, gerenciamento de produtos, controle de estoque e registro de vendas.

A aplicação possui dois perfis de usuários:

- Cliente → responsável pela navegação, visualização de produtos e realização de compras.
- Administrador → responsável pelo gerenciamento completo da loja através do painel administrativo.

Além disso, o sistema conta com:
- CRUD completo de produtos
- Controle automatizado de estoque
- Registro de vendas
- Ranking de produtos mais vendidos
- Dashboard administrativo
- Sistema de autenticação
- Agendamento de tarefas utilizando Schedule do Laravel

---

# 📋 Pré-requisitos

- PHP >= 8.1
- Composer >= 2.0
- Node.js >= 18
- NPM
- Git
- MySQL >= 8.0

---

# ⚙️ Passo a passo da configuração

Siga os passos abaixo para configurar o sistema localmente.

---

## 1. Clonar o Repositório

Clone este repositório em sua máquina local utilizando o comando:

```bash
git clone https://github.com/seu_usuario/LojaVirtual-Codifica2025.git
```

---

## 2. Entrar na Pasta do Projeto

```bash
cd LojaVirtual-Codifica2025
```

---

## 3. Configurar o Arquivo `.env`

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Depois, configure as variáveis do banco de dados no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lojavirtual
DB_USERNAME=root
DB_PASSWORD=
```

---

## 4. Instalar Dependências PHP

Instale as dependências do projeto utilizando o Composer:

```bash
composer install
```

---

## 5. Instalar Dependências Front-end

```bash
npm install
```

---

## 6. Gerar Chave da Aplicação

```bash
php artisan key:generate
```

---

## 7. Executar as Migrações

Execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

---

## 8. Executar Seeders (Opcional)

Caso existam seeders configurados no projeto:

```bash
php artisan db:seed
```

---

## 9. Executar o Projeto

Inicie o servidor local com:

```bash
php artisan serve
```

O sistema estará disponível em:

```bash
http://127.0.0.1:8000
```

---

## 10. Executar o Vite

Para carregar os arquivos CSS e JavaScript:

```bash
npm run dev
```

---

# 👥 Funcionalidades do Cliente

O usuário cliente pode:

- Criar conta
- Fazer login
- Navegar pelos produtos
- Visualizar detalhes dos produtos
- Adicionar produtos ao carrinho
- Finalizar compras
- Visualizar histórico de compras
- Acessar painel `/cliente`
- Visualizar ranking de produtos mais vendidos

---

# 🛠️ Funcionalidades do Administrador

O administrador possui acesso ao painel `/admin`, onde pode:

- Cadastrar produtos
- Editar produtos
- Excluir produtos
- Gerenciar estoque
- Visualizar vendas
- Filtrar vendas
- Monitorar produtos com baixo estoque
- Visualizar dashboard administrativo

---

# 📦 Gerenciamento de Estoque

O sistema possui controle automático e manual de estoque. *

## Controle Automático
Sempre que uma venda é realizada:
- o estoque do produto é atualizado automaticamente; *
- a quantidade disponível é reduzida em tempo real. *

## Controle Manual
O administrador pode:
- ajustar quantidades;
- reabastecer produtos;
- corrigir estoque manualmente.

---

# 🔄 CRUDs Implementados

O sistema possui CRUD completo para:

- Produtos
- Categorias
- Usuários
- Vendas

---

# ⏰ Schedule do Laravel

O projeto utiliza o sistema de agendamento de tarefas do Laravel. *

Exemplo de utilização:
- monitoramento de estoque baixo;
- execução de tarefas automáticas;
- atualizações programadas do sistema.

Comando utilizado:

```bash
php artisan schedule:work
```

---

# 🗄️ Estrutura do Banco de Dados

Principais tabelas do sistema:

- users
- produtos
- categorias
- vendas
- itens_venda
- estoque

Relacionamentos:
- um usuário pode realizar várias vendas;
- uma venda pode possuir vários produtos;
- produtos pertencem a categorias;
- produtos possuem controle de estoque.

---

# 🧠 Ferramentas Utilizadas no Projeto

## DrawSQL
Utilizado para modelagem do banco de dados.

## Excalidraw
Utilizado para criação dos mockups e planejamento visual.

## Trello
Utilizado para organização e divisão de tarefas do grupo.

---

# 🚀 Tecnologias Utilizadas

## Backend
- PHP
- Laravel

## Frontend
- HTML5
- CSS3
- JavaScript
- Tailwind CSS
- Vite
- Axios

## Banco de Dados
- MySQL

## Ferramentas
- Git
- GitHub
- Trello
- DrawSQL
- Excalidraw

---

# 📚 Aprendizados

Durante o desenvolvimento do projeto foram aplicados conceitos como:

- Arquitetura MVC
- CRUD completo
- Laravel Authentication
- Middlewares
- Controle de estoque
- Relacionamento entre tabelas
- Versionamento com Git
- Task Scheduling
- Desenvolvimento Full Stack
- Trabalho em equipe

---

# 📄 Licença

Projeto desenvolvido para fins acadêmicos e educacionais.












Projeto com fins educacionais.