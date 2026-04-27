<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SenaiStock</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --red:#CC0000;
  --red-dark:#990000;
  --red-light:#FF2222;
  --black:#0A0A0A;
  --gray-900:#111111;
  --gray-700:#2A2A2A;
  --gray-300:#BBBBBB;
  --white:#FAFAFA;
  --font-display:'Bebas Neue',sans-serif;
  --font-body:'DM Sans',sans-serif;
}
body{background:var(--white);color:var(--black);font-family:var(--font-body);min-height:100vh;overflow-x:hidden}

/* NAVBAR */
nav{display:flex;align-items:center;justify-content:space-between;padding:1.25rem 3rem;border-bottom:1px solid #1f1f1f;position:relative;z-index:10}
.logo{font-family:var(--font-display);font-size:2rem;letter-spacing:0.05em;color:var(--black)}
.logo span{color:var(--red)}
.nav-links{display:flex;align-items:center;gap:0.75rem}
.btn-login{background:transparent;color:var(--black);border:1px solid #CCC;padding:0.55rem 1.5rem;font-family:var(--font-body);font-size:0.875rem;font-weight:500;cursor:pointer;border-radius:3px;letter-spacing:0.03em;transition:border-color 0.2s,color 0.2s}
.btn-login:hover{border-color:var(--gray-700);color:var(--black)}
.btn-register{background:var(--red);color:var(--white);border:1px solid var(--red);padding:0.55rem 1.5rem;font-family:var(--font-body);font-size:0.875rem;font-weight:600;cursor:pointer;border-radius:3px;letter-spacing:0.03em;transition:background 0.2s,border-color 0.2s}
.btn-register:hover{background:var(--red-light);border-color:var(--red-light)}

/* HERO */
.hero{padding:5rem 3rem 4rem;display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;max-width:1200px;margin:0 auto}
.hero-label{display:inline-flex;align-items:center;gap:0.5rem;background:#1a0000;border:1px solid #3a0000;color:#ff6666;font-size:0.75rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;padding:0.35rem 0.85rem;border-radius:2px;margin-bottom:1.5rem}
.hero-label::before{content:'';width:6px;height:6px;background:var(--red-light);border-radius:50%;animation:pulse 1.8s ease-in-out infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:0.3}}
.hero h1{font-family:var(--font-display);font-size:5.5rem;line-height:0.92;letter-spacing:0.02em;color:var(--black);margin-bottom:1.5rem}
.hero h1 .accent{color:var(--red)}
.hero-sub{font-size:1.05rem;color:var(--gray-700);line-height:1.7;max-width:420px;margin-bottom:2.5rem}
.hero-cta{display:flex;gap:0.75rem;flex-wrap:wrap}
.cta-primary{background:var(--red);color:var(--white);border:none;padding:0.85rem 2.2rem;font-family:var(--font-body);font-size:0.95rem;font-weight:600;cursor:pointer;border-radius:3px;letter-spacing:0.03em;transition:background 0.2s;display:inline-flex;align-items:center;gap:0.5rem}
.cta-primary:hover{background:var(--red-light)}
.cta-secondary{background:transparent;color:var(--black);border:1px solid #CCC;padding:0.85rem 2.2rem;font-family:var(--font-body);font-size:0.95rem;font-weight:500;cursor:pointer;border-radius:3px;letter-spacing:0.03em;transition:border-color 0.2s}
.cta-secondary:hover{border-color:#666}

/* DASHBOARD PREVIEW */
.hero-visual{position:relative}
.dashboard-mock{background:#FFF;border:1px solid #DDD;border-radius:8px;overflow:hidden;box-shadow:0 0 0 1px #CCC,0 40px 80px rgba(0,0,0,0.15)}
.dash-topbar{background:#F5F5F5;border-bottom:1px solid #DDD;padding:0.75rem 1rem;display:flex;align-items:center;gap:0.5rem}
.dot{width:10px;height:10px;border-radius:50%}
.dot.r{background:#CC0000}.dot.y{background:#444}.dot.g{background:#444}
.dash-topbar-title{margin-left:0.75rem;font-size:0.75rem;color:#888;font-weight:500}
.dash-body{padding:1rem}
.dash-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:0.5rem;margin-bottom:0.75rem}
.stat-card{background:#F5F5F5;border:1px solid #DDD;border-radius:5px;padding:0.6rem 0.75rem}
.stat-label{font-size:0.65rem;color:#888;text-transform:uppercase;letter-spacing:0.08em;margin-bottom:0.25rem}
.stat-value{font-family:var(--font-display);font-size:1.4rem;color:var(--black);letter-spacing:0.02em}
.stat-value.danger{color:var(--red)}
.stat-value.ok{color:#22cc66}
.dash-table{background:#F5F5F5;border:1px solid #DDD;border-radius:5px;overflow:hidden}
.table-header{background:#EEE;display:grid;grid-template-columns:2fr 1fr 1fr;padding:0.4rem 0.75rem;font-size:0.65rem;color:#777;text-transform:uppercase;letter-spacing:0.08em}
.table-row{display:grid;grid-template-columns:2fr 1fr 1fr;padding:0.4rem 0.75rem;border-top:1px solid #EEE;font-size:0.72rem;color:#444;align-items:center}
.table-row:hover{background:#EEE}
.badge{display:inline-block;padding:0.1rem 0.4rem;border-radius:2px;font-size:0.6rem;font-weight:600;letter-spacing:0.05em;text-transform:uppercase}
.badge.low{background:#2a0000;color:#ff6666}
.badge.ok{background:#002a10;color:#44ee88}
.badge.mid{background:#1a1500;color:#ccaa00}
.item-dot{width:6px;height:6px;border-radius:50%;background:#333;display:inline-block;margin-right:0.4rem}

/* STATS STRIP */
.stats-strip{border-top:1px solid #1a1a1a;border-bottom:1px solid #1a1a1a;padding:2.5rem 3rem;display:grid;grid-template-columns:repeat(4,1fr);text-align:center;max-width:1200px;margin:0 auto}
.strip-item{padding:1rem}
.strip-num{font-family:var(--font-display);font-size:3rem;color:var(--red);letter-spacing:0.02em;line-height:1}
.strip-desc{font-size:0.8rem;color:var(--gray-700);text-transform:uppercase;letter-spacing:0.08em;margin-top:0.35rem}

/* FEATURES */
.features{padding:5rem 3rem;max-width:1200px;margin:0 auto}
.section-label{font-size:0.75rem;color:var(--red);text-transform:uppercase;letter-spacing:0.12em;font-weight:600;margin-bottom:0.75rem}
.section-title{font-family:var(--font-display);font-size:3rem;color:var(--black);margin-bottom:3rem;letter-spacing:0.02em}
.features-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:#DDD;border:1px solid #DDD;border-radius:8px;overflow:hidden}
.feat-card{background:#FFF;padding:2rem;transition:background 0.2s}
.feat-card:hover{background:#F5F5F5}
.feat-icon{width:36px;height:36px;background:#1a0000;border:1px solid #3a0000;border-radius:5px;display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem}
.feat-icon svg{width:18px;height:18px;stroke:var(--red);fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.feat-title{font-size:0.95rem;font-weight:600;color:var(--black);margin-bottom:0.5rem}
.feat-desc{font-size:0.82rem;color:#777;line-height:1.65}

/* FOOTER */
footer{border-top:1px solid #DDD;padding:2rem 3rem;display:flex;justify-content:space-between;align-items:center}
.footer-logo{font-family:var(--font-display);font-size:1.4rem;color:#888;letter-spacing:0.05em}
.footer-logo span{color:#CC0000}
.footer-copy{font-size:0.75rem;color:#888}

/* DIVIDERS */
.divider{height:1px;background:linear-gradient(90deg,transparent,#DDD 20%,#DDD 80%,transparent);max-width:1200px;margin:0 auto}
</style>
</head>
<body>

<nav>
  <div class="logo">SENAI<span>STOCK</span></div>
  <div class="nav-links">
    <button class="btn-login">Entrar</button>
    <button class="btn-register">Cadastrar</button>
  </div>
</nav>

<section style="max-width:1200px;margin:0 auto">
<div class="hero">
  <div class="hero-content">
    <div class="hero-label">Sistema de Gestão de Estoque</div>
    <h1>CONTROLE<br>SEU <span class="accent">ESTO</span><br><span class="accent">QUE.</span></h1>
    <p class="hero-sub">Gerencie entradas, saídas e inventário da sua unidade SENAI com precisão e agilidade. Tudo em um só lugar.</p>
    <div class="hero-cta">
    </div>
  </div>

  <div class="hero-visual">
    <div class="dashboard-mock">
      <div class="dash-topbar">
        <div class="dot r"></div><div class="dot y"></div><div class="dot g"></div>
        <span class="dash-topbar-title">SenaiStock — Painel Principal</span>
      </div>
      <div class="dash-body">
        <div class="dash-stats">
          <div class="stat-card">
            <div class="stat-label">Total Itens</div>
            <div class="stat-value">1.284</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Estoque Baixo</div>
            <div class="stat-value danger">07</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Entradas Hoje</div>
            <div class="stat-value ok">+43</div>
          </div>
        </div>
        <div class="dash-table">
          <div class="table-header">
            <span>Produto</span><span>Qtd.</span><span>Status</span>
          </div>
          <div class="table-row">
            <span><span class="item-dot" style="background:#CC0000"></span>ADMINISTRAÇÃO EMPRESARIAL – FUNDAMENTOS E ESTRUTURA ORGANIZACIONAL</span>
            <span>12</span>
            <span><span class="badge low">Baixo</span></span>
          </div>
          <div class="table-row">
            <span><span class="item-dot" style="background:#22cc66"></span>CABINE PRIMÁRIA – OPERAÇÃO E MANUTENÇÃO DE SUBESTAÇÕES</span>
            <span>340</span>
            <span><span class="badge ok">Normal</span></span>
          </div>
          <div class="table-row">
            <span><span class="item-dot" style="background:#ccaa00"></span>COMUNICAÇÃO INTERPESSOAL – PRINCÍPIOS, TÉCNICAS E HABILIDADES</span>
            <span>58</span>
            <span><span class="badge mid">Médio</span></span>
          </div>
          <div class="table-row">
            <span><span class="item-dot" style="background:#CC0000"></span>TÉCNICAS PARA MANTER BOAS RELAÇÕES NO TRABALHO: METODOLOGIA TRAINING WITHIN INDUSTRY (TWI)</span>
            <span>5</span>
            <span><span class="badge low">Baixo</span></span>
          </div>
          <div class="table-row">
            <span><span class="item-dot" style="background:#22cc66"></span>MICROCONTROLADOR PIC18 COM LINGUAGEM C – CONCEITOS, EXEMPLOS E SIMULAÇÃO</span>
            <span>21</span>
            <span><span class="badge ok">Normal</span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<div class="divider"></div>

<div class="stats-strip">
  <div class="strip-item">
    <div class="strip-num">50+</div>
    <div class="strip-desc">Unidades SENAI</div>
  </div>
  <div class="strip-item">
    <div class="strip-num">12K</div>
    <div class="strip-desc">Livros Cadastrados</div>
  </div>
  <div class="strip-item">
    <div class="strip-num">99%</div>
    <div class="strip-desc">Disponibilidade</div>
  </div>
  <div class="strip-item">
    <div class="strip-num">380</div>
    <div class="strip-desc">Livros sendo Utilizados</div>
  </div>
</div>

<div class="divider"></div>

<section class="features">
  <div class="section-label">Funcionalidades</div>
  <div class="section-title">TUDO QUE VOCÊ PRECISA</div>
  <div class="features-grid">
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
      </div>
      <div class="feat-title">Controle de Inventário</div>
      <div class="feat-desc">Cadastre, edite e organize todos os itens do seu estoque com categorias e localização.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </div>
      <div class="feat-title">Entradas e Saídas</div>
      <div class="feat-desc">Registre movimentações em tempo real com histórico completo e rastreabilidade.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
      </div>
      <div class="feat-title">Relatórios</div>
      <div class="feat-desc">Gere relatórios detalhados de consumo, reposição e movimentação por período.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <div class="feat-title">Alertas de Estoque</div>
      <div class="feat-desc">Receba notificações automáticas quando itens atingirem o nível mínimo configurado.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
      </div>
      <div class="feat-title">Controle de Acesso</div>
      <div class="feat-desc">Gerencie permissões por perfil: aluno, instrutor e gestor com logs de atividade.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">
        <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      </div>
      <div class="feat-title">Requisições</div>
      <div class="feat-desc">Fluxo de solicitação e aprovação de materiais entre setores com assinatura digital.</div>
    </div>
  </div>
</section>

<footer>
  <div class="footer-logo">SENAI<span>STOCK</span></div>
  <div class="footer-copy">© 2026 SenaiStock — Sistema de Gestão de Estoque</div>
</footer>

</body>
</html>