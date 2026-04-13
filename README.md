<div align="center">
<p align="center">
  <img src="https://img.shields.io/badge/status-em%20desenvolvimento-yellow?style=for-the-badge&labelColor=1a1a2e" />
  <img src="https://img.shields.io/badge/versão-1.0.0-E63946?style=for-the-badge&labelColor=1a1a2e" />
  <img src="https://img.shields.io/badge/licença-MIT-06D6A0?style=for-the-badge&labelColor=1a1a2e" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/JWT-Auth-000000?style=for-the-badge&logo=jsonwebtokens&logoColor=white" />
  <img src="https://img.shields.io/badge/REST-API-009688?style=for-the-badge&logo=fastapi&logoColor=white" />
</p>

<br/>

> **SenaiStock** é uma API Back-End desenvolvida para solucionar o problema de falta de controle no estoque de livros didáticos das unidades do SENAI — garantindo visibilidade em tempo real das entradas, saídas e saldo disponível de cada título.

<br/>

<a href="https://www.figma.com/design/M7R4XNE1nqFYKxxIf6CCmI/Estocaê---Controle-de-Estoque-Inteligente--Community-?node-id=0-1&p=f&t=ZBTqW3s6Edtrxwt8-0">
  <img src="https://img.shields.io/badge/🎨_Protótipo-Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white" />
</a>
&nbsp;
<a href="https://trello.com/b/xdJxiHCh/controle-de-estoque-de-livros-didaticos-senai">
  <img src="https://img.shields.io/badge/📋_Board-Trello-0052CC?style=for-the-badge&logo=trello&logoColor=white" />
</a>
&nbsp;
<a href="#-endpoints">
  <img src="https://img.shields.io/badge/📡_Documentação-Endpoints-2D333B?style=for-the-badge" />
</a>

</div>

<br/>

---

## 📌 Índice

- [O Problema](#-o-problema)
- [A Solução](#-a-solução)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias](#-tecnologias)
- [Arquitetura](#-arquitetura)
- [Como Rodar](#-como-rodar)
- [Endpoints](#-endpoints)
- [Requisitos do Sistema](#-requisitos-do-sistema)
- [Protótipos](#-protótipos)
- [Equipe](#-equipe)

---

## 🔍 O Problema

O almoxarifado das unidades SENAI recebe **grandes remessas de livros didáticos** periodicamente — mas não possui nenhum sistema eficiente para rastrear o que sai. Isso gera um ciclo problemático:

```
📦 Remessa chega  →  📚 Livros distribuídos sem controle
        ↓
⚠️  Título esgota  →  🎓 Turma não recebe material
        ↓
❌ Atraso no processo de aprendizado
```

Sem visibilidade do estoque em tempo real, o almoxarife só descobre que um título acabou quando uma turma já precisa dele.

---

## 💡 A Solução

O **SenaiStock** centraliza e automatiza o controle de estoque, oferecendo:

- ✅ Registro de **entradas** (recebimento de remessas)
- ✅ Registro de **saídas** (retirada para turmas)
- ✅ **Saldo atualizado em tempo real** por título
- ✅ **Alertas automáticos** quando o estoque atinge nível crítico
- ✅ **Histórico completo** de todas as movimentações
- ✅ **Bloqueio inteligente** para evitar saídas com saldo insuficiente

---

## ✨ Funcionalidades

<table>
  <thead>
    <tr>
      <th>Módulo</th>
      <th>Funcionalidade</th>
      <th>Descrição</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>🔐 <strong>Auth</strong></td>
      <td>Autenticação</td>
      <td>Login via Token JWT / Sanctum para Almoxarifes e Coordenadores</td>
    </tr>
    <tr>
      <td>📖 <strong>Livros</strong></td>
      <td>CRUD de Títulos</td>
      <td>Cadastrar, editar e excluir livros com Título, ISBN e Matéria</td>
    </tr>
    <tr>
      <td>📥 <strong>Estoque</strong></td>
      <td>Entrada de Remessa</td>
      <td>Soma quantidades ao saldo quando novas remessas chegam</td>
    </tr>
    <tr>
      <td>📤 <strong>Estoque</strong></td>
      <td>Saída para Turmas</td>
      <td>Subtrai quantidades do saldo quando livros são retirados</td>
    </tr>
    <tr>
      <td>🚫 <strong>Validação</strong></td>
      <td>Bloqueio de Saldo</td>
      <td>Impede saída quando a quantidade solicitada excede o saldo</td>
    </tr>
    <tr>
      <td>⚠️ <strong>Alertas</strong></td>
      <td>Estoque Crítico</td>
      <td>Lista livros com saldo abaixo do mínimo definido (padrão: &lt; 10)</td>
    </tr>
    <tr>
      <td>📊 <strong>Histórico</strong></td>
      <td>Rastreabilidade</td>
      <td>Registra responsável, data, tipo e quantidade de cada movimentação</td>
    </tr>
  </tbody>
</table>

---

## 🛠️ Tecnologias

<table>
  <tr>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=php" width="48" height="48" alt="PHP"/><br/>
      <sub><b>PHP 8.2</b></sub>
    </td>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=laravel" width="48" height="48" alt="Laravel"/><br/>
      <sub><b>Laravel 11</b></sub>
    </td>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=mysql" width="48" height="48" alt="MySQL"/><br/>
      <sub><b>MySQL 8</b></sub>
    </td>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=postman" width="48" height="48" alt="Postman"/><br/>
      <sub><b>Postman</b></sub>
    </td>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=figma" width="48" height="48" alt="Figma"/><br/>
      <sub><b>Figma</b></sub>
    </td>
    <td align="center" width="100">
      <img src="https://skillicons.dev/icons?i=git" width="48" height="48" alt="Git"/><br/>
      <sub><b>Git</b></sub>
    </td>
  </tr>
</table>

**Destaques da stack:**

- 🏗️ **Eloquent ORM** — todas as operações de banco via ORM, sem SQL manual
- 🔒 **Hash Bcrypt** — senhas criptografadas com segurança
- 🌐 **RESTful + JSON** — padrão de comunicação moderno e universal
- 📐 **PSR + Clean Code** — código legível, organizado e fácil de manter

---

## 🏛️ Arquitetura

```
senaistock/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── LivroController.php
│   │   │   └── EstoqueController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Livro.php
│   │   └── Movimentacao.php
│   └── Services/
│       └── EstoqueService.php
├── database/
│   └── migrations/
├── routes/
│   └── api.php
└── tests/
```

---

## 🚀 Como Rodar

### Pré-requisitos

- PHP >= 8.2
- Composer
- MySQL
- Git

### Instalação

```bash
# 1. Clone o repositório
git clone https://github.com/viviane019/Livros_Projeto2026.git
cd Livros_Projeto2026

# 2. Instale as dependências
composer install

# 3. Configure o ambiente
cp .env.example .env
php artisan key:generate

# 4. Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=senaistock
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# 5. Execute as migrations
php artisan migrate

# 6. (Opcional) Popule com dados de teste
php artisan db:seed

# 7. Inicie o servidor
php artisan serve
```

🟢 API disponível em: `http://localhost:8000/api`

---

## 📡 Endpoints

> Todas as rotas marcadas com 🔒 exigem `Authorization: Bearer {token}` no header.

### 🔐 Autenticação

```http
POST   /api/login              → Autenticar usuário
POST   /api/logout             → 🔒 Encerrar sessão
GET    /api/me                 → 🔒 Dados do usuário logado
```

### 📖 Livros

```http
GET    /api/livros             → 🔒 Listar todos os livros
POST   /api/livros             → 🔒 Cadastrar novo livro
GET    /api/livros/{id}        → 🔒 Detalhes de um livro
PUT    /api/livros/{id}        → 🔒 Atualizar livro
DELETE /api/livros/{id}        → 🔒 Excluir livro
```

### 📦 Estoque

```http
POST   /api/estoque/entrada    → 🔒 Registrar entrada de remessa
POST   /api/estoque/saida      → 🔒 Registrar saída para turma
GET    /api/estoque/critico    → 🔒 Listar estoque abaixo do mínimo
GET    /api/estoque/historico  → 🔒 Ver histórico de movimentações
```

### Exemplo de Request — Saída de Estoque

```json
POST /api/estoque/saida
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGci...

{
  "livro_id": 3,
  "quantidade": 20,
  "turma": "DS-M23",
  "observacao": "Entrega inicial do semestre"
}
```

### Exemplo de Response

```json
{
  "success": true,
  "message": "Saída registrada com sucesso.",
  "data": {
    "livro": "Lógica de Programação",
    "quantidade_retirada": 20,
    "saldo_anterior": 45,
    "saldo_atual": 25,
    "movimentado_por": "Vitória N. Pereira",
    "data": "2026-04-13T19:00:00Z"
  }
}
```

---

## 📋 Requisitos do Sistema

### Funcionais

| ID | Funcionalidade | Status |
|----|---------------|--------|
| RF01 | Autenticação de usuários (JWT/Sanctum) | 🟡 Em andamento |
| RF02 | CRUD de livros (Título, ISBN, Matéria) | 🟡 Em andamento |
| RF03 | Entrada de estoque (remessas) | 🟡 Em andamento |
| RF04 | Saída de estoque (turmas) | 🟡 Em andamento |
| RF05 | Bloqueio de saldo insuficiente | 🟡 Em andamento |
| RF06 | Alerta de estoque crítico (< 10 un.) | 🟡 Em andamento |
| RF07 | Histórico de movimentações | 🟡 Em andamento |

### Não Funcionais

| ID | Requisito | Tecnologia |
|----|-----------|------------|
| RNF01 | Linguagem e Framework | PHP + Laravel |
| RNF02 | Banco de dados relacional | MySQL |
| RNF03 | Padrão de comunicação RESTful | JSON |
| RNF04 | ORM obrigatório | Eloquent |
| RNF05 | Criptografia de senhas | Hash Bcrypt |
| RNF06 | Padronização de código | PSR + Clean Code |
| RNF07 | Documentação de rotas | Postman / Insomnia |

---

## 🎨 Protótipos

Os protótipos foram criados no **Figma** e cobrem todas as telas principais do sistema:

| Tela | Descrição |
|------|-----------|
| 🔑 Login | Autenticação de Almoxarifes e Coordenadores |
| 📚 Catálogo | Listagem e busca de livros cadastrados |
| 📥 Entrada | Registro de chegada de remessas |
| 📤 Saída | Retirada de livros para turmas |
| ⚠️ Monitoramento | Painel de saldo e alertas de estoque crítico |

👉 **[Acessar protótipo completo no Figma](https://www.figma.com/design/M7R4XNE1nqFYKxxIf6CCmI/Estocaê---Controle-de-Estoque-Inteligente--Community-?node-id=0-1&p=f&t=ZBTqW3s6Edtrxwt8-0)**

---

## 👩‍💻 Equipe

<table align="center">
  <tr>
    <td align="center">
      <b>Viviane V. N. Santos</b><br/>
      <sub>Desenvolvedora Back-End</sub><br/><br/>
      <a href="https://github.com/viviane019">
        <img src="https://img.shields.io/badge/GitHub-viviane019-181717?style=flat-square&logo=github" />
      </a>
    </td>
    <td align="center">
      <b>Vitória N. Pereira</b><br/>
      <sub>Desenvolvedora Back-End</sub><br/><br/>
      <img src="https://img.shields.io/badge/GitHub-perfil-181717?style=flat-square&logo=github" />
    </td>
  </tr>
</table>

<br/>

> Projeto desenvolvido no **SENAI – SP** com metodologia colaborativa e adaptativa: as tarefas são distribuídas a cada sessão conforme a demanda, garantindo que ambas as integrantes tenham conhecimento sobre todas as partes do sistema.

---

<div align="center">

<br/>

<sub>Feito por Viviane e Vitória · SENAI SP · 2026</sub>

</div>
