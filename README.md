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

# 🐳 Comece por aqui (Docker)

O projeto roda 100% em containers — você **não precisa** instalar PHP, MySQL, Composer ou Node na máquina. Só Docker.

| Quero... | Vá para |
|---|---|
| **Rodar pela primeira vez** (Windows / macOS / Linux) — instalar Docker e subir | [`docs/primeiros-passos.md`](./docs/primeiros-passos.md) |
| Referência completa (comandos do dia a dia, phpMyAdmin, troubleshooting) | [`docs/desenvolvimento.md`](./docs/desenvolvimento.md) |
| Preparar uma VPS Linux para deploy (Docker, Nginx, Certbot, firewall) | [`docs/preparar-producao.md`](./docs/preparar-producao.md) |
| Fazer o deploy do projeto em servidor com HTTPS | [`docs/producao.md`](./docs/producao.md) |
| Autorizar o servidor a clonar o repositório (Deploy Key ou PAT) | [`docs/acesso-github.md`](./docs/acesso-github.md) |

---

# 📋 Pré-requisitos

- **Docker Desktop** (Windows/macOS) ou **Docker Engine** (Linux) — única coisa que precisa instalar
- **Git**

Tudo o mais (PHP 8.4, MySQL 8, Composer, Node 20, Vite, Tailwind, phpMyAdmin) vem dentro dos containers.

---

# ⚙️ Passo a passo da configuração

> Detalhes, troubleshooting e instruções por sistema operacional em [`docs/primeiros-passos.md`](./docs/primeiros-passos.md).

## 1. Clonar o Repositório

```bash
git clone https://github.com/seu_usuario/LojaVirtual-Codifica2025-Grupo1.git
cd LojaVirtual-Codifica2025-Grupo1
```

## 2. Configurar o Arquivo `.env`

```bash
cp .env.example .env
```

Edite o `.env` e ajuste o bloco do banco para apontar para o container:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=loja
DB_USERNAME=loja
DB_PASSWORD=secret
```

## 3. Subir os containers

```bash
docker compose --profile dev up -d --build
```

A primeira execução demora ~5 min (baixa imagens e instala dependências). Da segunda vez em diante, sobe em segundos.

## 4. Instalar dependências e preparar o Laravel

```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
docker compose exec app php artisan storage:link
docker compose exec app npm install
docker compose exec app npm run build
```

## 5. Acessar

- **Aplicação:** http://localhost
- **phpMyAdmin** (admin do banco): http://localhost:8080 — usuário: `loja` / senha: `secret`

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

O sistema possui controle automático e manual de estoque.

## Controle Automático
Sempre que uma venda é realizada:
- o estoque do produto é atualizado automaticamente;
- a quantidade disponível é reduzida em tempo real.

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
- Cores
- Tamanhos
- Modelos
- Variações de produtos

---

# ⏰ Schedule do Laravel

O projeto utiliza o sistema de agendamento de tarefas do Laravel.

Rotina implementada neste projeto:
- atualização do ranking de mais vendidos (`mais-vendidos:atualizar`) a cada 10 minutos.

Comando utilizado (dentro do container):

```bash
docker compose exec app php artisan schedule:work
```

---

# 🗄️ Estrutura do Banco de Dados

Principais tabelas do sistema:

- usuarios
- produtos
- categorias
- modelos
- cores
- tamanhos
- variacoes_produtos
- vendas
- carrinhos
- carrinho_itens
- mais_vendidos

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
- PHP 8.4
- Laravel 13

## Frontend
- HTML5
- CSS3
- JavaScript
- Tailwind CSS 4
- Vite 8
- Axios

## Banco de Dados
- MySQL 8

## Infraestrutura
- Docker
- Docker Compose v2
- Nginx
- phpMyAdmin (somente em desenvolvimento)

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
- Containerização com Docker
- Desenvolvimento Full Stack
- Trabalho em equipe

---

# 📄 Licença

Projeto desenvolvido para fins acadêmicos e educacionais.
