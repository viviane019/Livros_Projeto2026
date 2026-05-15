<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SenaiStock – Dashboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --red:#CC0000;
  --red-dark:#990000;
  --red-light:#FF2222;
  --blue:#4A90D9;
  --blue-light:#6BAEE8;
  --green:#22c55e;
  --yellow:#f59e0b;
  --purple:#8b5cf6;
  --bg:#F0F2F5;
  --sidebar-bg:#FFFFFF;
  --card-bg:#FFFFFF;
  --black:#111827;
  --gray-50:#F9FAFB;
  --gray-100:#F3F4F6;
  --gray-200:#E5E7EB;
  --gray-300:#D1D5DB;
  --gray-400:#9CA3AF;
  --gray-500:#6B7280;
  --gray-600:#4B5563;
  --gray-700:#374151;
  --white:#FFFFFF;
  --font-display:'Bebas Neue',sans-serif;
  --font-body:'DM Sans',sans-serif;
  --sidebar-width:220px;
  --topbar-height:60px;
}

body{
  background:var(--bg);
  color:var(--black);
  font-family:var(--font-body);
  min-height:100vh;
  display:flex;
  overflow-x:hidden;
}

/* ── SIDEBAR ── */
.sidebar{
  width:var(--sidebar-width);
  background:var(--sidebar-bg);
  border-right:1px solid var(--gray-200);
  display:flex;
  flex-direction:column;
  position:fixed;
  top:0;left:0;
  height:100vh;
  z-index:100;
  padding:0 0 1.5rem;
}

.sidebar-logo{
  display:flex;
  align-items:center;
  gap:0.6rem;
  padding:1.1rem 1.25rem;
  border-bottom:1px solid var(--gray-200);
  margin-bottom:0.5rem;
}
.logo-icon{
  width:36px;height:36px;
  background:var(--black);
  border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.logo-icon svg{width:20px;height:20px;fill:none;stroke:#fff;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.logo-text{font-family:var(--font-display);font-size:1.35rem;letter-spacing:0.04em;color:var(--black);line-height:1}
.logo-text span{color:var(--red)}
.logo-sub{font-size:0.6rem;color:var(--gray-400);letter-spacing:0.06em;text-transform:uppercase;line-height:1}

.sidebar-section-label{
  font-size:0.65rem;
  font-weight:600;
  color:var(--gray-400);
  text-transform:uppercase;
  letter-spacing:0.1em;
  padding:0.75rem 1.25rem 0.4rem;
}

.nav-item{
  display:flex;
  align-items:center;
  gap:0.65rem;
  padding:0.6rem 1.25rem;
  font-size:0.85rem;
  font-weight:500;
  color:var(--gray-600);
  cursor:pointer;
  border-radius:0;
  transition:background 0.15s,color 0.15s;
  position:relative;
  text-decoration:none;
  border:none;background:transparent;width:100%;text-align:left;
}
.nav-item:hover{background:var(--gray-50);color:var(--gray-800)}
.nav-item.active{
  background:#FFF0F0;
  color:var(--red);
  font-weight:600;
}
.nav-item.active::before{
  content:'';
  position:absolute;
  left:0;top:0;bottom:0;
  width:3px;
  background:var(--red);
  border-radius:0 2px 2px 0;
}
.nav-item svg{width:17px;height:17px;flex-shrink:0;stroke:currentColor;fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}

.sidebar-footer{
  margin-top:auto;
  padding:0.75rem 1.25rem;
  border-top:1px solid var(--gray-200);
  display:flex;
  align-items:center;
  gap:0.65rem;
}
.avatar{
  width:34px;height:34px;
  border-radius:50%;
  background:linear-gradient(135deg,#4A90D9,#8b5cf6);
  display:flex;align-items:center;justify-content:center;
  font-size:0.75rem;font-weight:700;color:#fff;
  flex-shrink:0;
}
.user-info{flex:1;min-width:0}
.user-name{font-size:0.78rem;font-weight:600;color:var(--gray-700);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.user-role{font-size:0.65rem;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.06em}

/* ── MAIN ── */
.main{
  margin-left:var(--sidebar-width);
  flex:1;
  display:flex;
  flex-direction:column;
  min-height:100vh;
}

/* TOPBAR */
.topbar{
  height:var(--topbar-height);
  background:var(--white);
  border-bottom:1px solid var(--gray-200);
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 1.75rem;
  position:sticky;
  top:0;
  z-index:50;
}
.topbar-title{font-size:1.1rem;font-weight:600;color:var(--black)}
.topbar-right{display:flex;align-items:center;gap:0.75rem}
.search-box{
  display:flex;align-items:center;gap:0.5rem;
  background:var(--gray-50);
  border:1px solid var(--gray-200);
  border-radius:7px;
  padding:0.45rem 0.85rem;
  font-size:0.82rem;
  color:var(--gray-400);
  width:200px;
}
.search-box svg{width:14px;height:14px;stroke:var(--gray-400);fill:none;stroke-width:2;flex-shrink:0}
.icon-btn{
  width:34px;height:34px;
  border:1px solid var(--gray-200);
  background:var(--white);
  border-radius:7px;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;
  position:relative;
}
.icon-btn svg{width:16px;height:16px;stroke:var(--gray-500);fill:none;stroke-width:1.8}
.notif-dot{
  width:7px;height:7px;
  background:var(--red);
  border-radius:50%;
  position:absolute;top:6px;right:6px;
  border:1.5px solid #fff;
}

/* CONTENT */
.content{
  padding:1.5rem 1.75rem;
  flex:1;
  display:flex;
  flex-direction:column;
  gap:1.25rem;
}

/* KPI CARDS */
.kpi-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:1rem;
}
.kpi-card{
  background:var(--white);
  border:1px solid var(--gray-200);
  border-radius:10px;
  padding:1.1rem 1.25rem;
  display:flex;
  flex-direction:column;
  gap:0.6rem;
}
.kpi-top{display:flex;align-items:flex-start;justify-content:space-between}
.kpi-label{font-size:0.75rem;color:var(--gray-500);font-weight:500}
.kpi-icon{
  width:36px;height:36px;
  border-radius:8px;
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.kpi-icon svg{width:18px;height:18px;fill:none;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.kpi-icon.blue{background:#EFF6FF;} .kpi-icon.blue svg{stroke:#4A90D9}
.kpi-icon.red{background:#FFF0F0;} .kpi-icon.red svg{stroke:var(--red)}
.kpi-icon.yellow{background:#FFFBEB;} .kpi-icon.yellow svg{stroke:#f59e0b}
.kpi-icon.purple{background:#F5F3FF;} .kpi-icon.purple svg{stroke:#8b5cf6}
.kpi-value{font-size:1.65rem;font-weight:700;color:var(--black);line-height:1}
.kpi-badge{display:flex;align-items:center;gap:0.3rem;font-size:0.72rem;font-weight:500}
.kpi-badge.up{color:var(--green)} .kpi-badge.down{color:var(--red)} .kpi-badge.neutral{color:var(--gray-500)}
.kpi-badge svg{width:12px;height:12px;stroke:currentColor;fill:none;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round}

/* ── MAIN CHART CARD ── */
.chart-card{
  background:var(--white);
  border:1px solid var(--gray-200);
  border-radius:10px;
  padding:1.25rem;
}
.chart-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem}
.chart-title{font-size:0.88rem;font-weight:600;color:var(--black)}
.chart-tabs{display:flex;gap:0.3rem}
.chart-tab{
  padding:0.3rem 0.7rem;
  border-radius:5px;
  font-size:0.75rem;font-weight:500;
  cursor:pointer;
  border:none;background:transparent;color:var(--gray-500);
  transition:background 0.12s,color 0.12s;
}
.chart-tab.active{background:var(--blue);color:#fff}
.chart-tab:hover:not(.active){background:var(--gray-100)}
.chart-area{width:100%;height:200px;position:relative}
svg.chart-svg{width:100%;height:100%;overflow:visible}

/* ── BOTTOM ROW ── */
.bottom-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:1rem;
}

/* ALERTA DE ESTOQUE */
.alert-card{
  background:var(--white);
  border:1px solid var(--gray-200);
  border-radius:10px;
  overflow:hidden;
}
.alert-card-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:1rem 1.25rem 0.75rem;
  border-bottom:1px solid var(--gray-100);
}
.alert-card-title{font-size:0.88rem;font-weight:600;color:var(--black)}
.alert-col-label{font-size:0.68rem;font-weight:600;color:var(--gray-400);text-transform:uppercase;letter-spacing:0.06em}
.alert-list{padding:0.25rem 0}
.alert-item{
  display:flex;
  align-items:center;
  gap:0.75rem;
  padding:0.7rem 1.25rem;
  border-bottom:1px solid var(--gray-100);
  transition:background 0.12s;
}
.alert-item:last-child{border-bottom:none}
.alert-item:hover{background:var(--gray-50)}
.alert-thumb{
  width:34px;height:34px;
  border-radius:7px;
  background:var(--gray-100);
  border:1px solid var(--gray-200);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.alert-thumb svg{width:16px;height:16px;fill:none;stroke:var(--gray-400);stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
.alert-name{font-size:0.8rem;font-weight:500;color:var(--gray-800);flex:1}
.alert-stock{
  display:flex;
  flex-direction:column;
  align-items:flex-end;
  gap:0.25rem;
  min-width:110px;
}
.alert-stock-text{font-size:0.75rem;font-weight:600;color:var(--gray-700)}
.stock-bar-bg{width:100%;height:5px;background:var(--gray-200);border-radius:99px;overflow:hidden}
.stock-bar-fill{height:100%;border-radius:99px}

/* PIE CHART CARD */
.pie-card{
  background:var(--white);
  border:1px solid var(--gray-200);
  border-radius:10px;
  padding:1.25rem;
  display:flex;
  flex-direction:column;
}
.pie-card-title{font-size:0.88rem;font-weight:600;color:var(--black);margin-bottom:1.1rem}
.pie-body{
  display:flex;
  align-items:center;
  gap:1.5rem;
  flex:1;
}
.pie-chart-wrap{
  width:160px;height:160px;
  flex-shrink:0;
  position:relative;
}
.pie-chart-wrap svg{width:100%;height:100%}
.pie-legend{
  display:flex;
  flex-direction:column;
  gap:0.55rem;
  flex:1;
}
.legend-item{
  display:flex;
  align-items:center;
  gap:0.5rem;
  font-size:0.78rem;
  color:var(--gray-700);
}
.legend-dot{
  width:10px;height:10px;
  border-radius:50%;
  flex-shrink:0;
}
.legend-pct{
  margin-left:auto;
  font-size:0.72rem;
  font-weight:600;
  color:var(--gray-500);
}
</style>
<script src="https://sites.super.myninja.ai/_assets/ninja-daytona-script.js"></script>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">
      <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
    </div>
    <div>
      <div class="logo-text">SENAI<span>STOCK</span></div>
      <div class="logo-sub">Gestão de Estoque</div>
    </div>
  </div>

  <div class="sidebar-section-label">Menu Principal</div>

  <button class="nav-item active">
    <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
    Dashboard
  </button>
  <button class="nav-item" data-href="/estoque">
    <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
    Estoque
  </button>
  <button class="nav-item">
    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
    Fornecedores
  </button>
  <button class="nav-item">
    <svg viewBox="0 0 24 24"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
    Movimentações
  </button>
  <button class="nav-item">
    <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
    Catálogo
  </button>

  <div class="sidebar-section-label" style="margin-top:0.5rem">Configurações</div>

  <button class="nav-item">
    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
    Sistema
  </button>
  <button class="nav-item">
    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
    Usuários
  </button>

  <div class="sidebar-footer">
    <div class="avatar">BA</div>
    <div class="user-info">
      <div class="user-name">Bruno Augusto de Moraes</div>
      <div class="user-role">Admin</div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <!-- TOPBAR -->
  <header class="topbar">
    <div class="topbar-title">Dashboard</div>
    <div class="topbar-right">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        Pesquisar…
      </div>
      <div class="icon-btn">
        <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <div class="notif-dot"></div>
      </div>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content">

    <!-- KPI CARDS -->
    <div class="kpi-grid">
      <div class="kpi-card">
        <div class="kpi-top">
          <div class="kpi-label">Total de Livros</div>
          <div class="kpi-icon blue">
            <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          </div>
        </div>
        <div class="kpi-value">1,248</div>
        <div class="kpi-badge up">
          <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
          12,5% do último mês
        </div>
      </div>

      <div class="kpi-card">
        <div class="kpi-top">
          <div class="kpi-label">Estoque Baixo</div>
          <div class="kpi-icon red">
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
        </div>
        <div class="kpi-value" style="color:var(--red)">5</div>
        <div class="kpi-badge down">
          <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
          5% do último mês
        </div>
      </div>

      <div class="kpi-card">
        <div class="kpi-top">
          <div class="kpi-label">Em atenção</div>
          <div class="kpi-icon yellow">
            <svg viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          </div>
        </div>
        <div class="kpi-value">17</div>
        <div class="kpi-badge up">
          <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
          Requer atenção
        </div>
      </div>

      <div class="kpi-card">
        <div class="kpi-top">
          <div class="kpi-label">Gasto do Mês</div>
          <div class="kpi-icon purple">
            <svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
        </div>
        <div class="kpi-value" style="font-size:1.35rem">R$ 1.284,00</div>
        <div class="kpi-badge up">
          <svg viewBox="0 0 24 24"><polyline points="18 15 12 9 6 15"/></svg>
          12 novos este mês
        </div>
      </div>
    </div>

    <!-- MAIN CHART: Controle de Movimentação -->
    <div class="chart-card">
      <div class="chart-header">
        <div class="chart-title">Controle de Movimentação de Estoque</div>
        <div class="chart-tabs">
          <button class="chart-tab active">Mês</button>
          <button class="chart-tab">Semana</button>
          <button class="chart-tab">Dia</button>
        </div>
      </div>
      <div class="chart-area">
        <svg class="chart-svg" viewBox="0 0 900 200" preserveAspectRatio="none">
          <defs>
            <linearGradient id="g1" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#4A90D9" stop-opacity="0.18"/>
              <stop offset="100%" stop-color="#4A90D9" stop-opacity="0"/>
            </linearGradient>
            <linearGradient id="g2" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#22c55e" stop-opacity="0.14"/>
              <stop offset="100%" stop-color="#22c55e" stop-opacity="0"/>
            </linearGradient>
          </defs>

          <!-- Y grid lines -->
          <line x1="20" y1="15"  x2="900" y2="15"  stroke="#E5E7EB" stroke-width="1"/>
          <line x1="20" y1="55"  x2="900" y2="55"  stroke="#E5E7EB" stroke-width="1"/>
          <line x1="20" y1="95"  x2="900" y2="95"  stroke="#E5E7EB" stroke-width="1"/>
          <line x1="20" y1="135" x2="900" y2="135" stroke="#E5E7EB" stroke-width="1"/>
          <line x1="20" y1="175" x2="900" y2="175" stroke="#E5E7EB" stroke-width="1"/>

          <!-- Y labels -->
          <text x="0" y="18"  font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif">50</text>
          <text x="0" y="58"  font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif">40</text>
          <text x="0" y="98"  font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif">30</text>
          <text x="0" y="138" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif">20</text>
          <text x="0" y="178" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif">10</text>

          <!-- X labels -->
          <text x="100"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Jan</text>
          <text x="220"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Fev</text>
          <text x="360"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Mar</text>
          <text x="490"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Abr</text>
          <text x="620"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Mai</text>
          <text x="750"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Jun</text>
          <text x="870"  y="195" font-size="9" fill="#9CA3AF" font-family="DM Sans,sans-serif" text-anchor="middle">Jul</text>

          <!-- Blue gradient fill -->
          <path d="M100,110 C150,105 190,95 220,88 C290,72 340,55 360,52 C420,45 460,42 490,44 C550,47 590,40 620,36 C680,30 720,24 750,20 C800,15 840,14 870,12 L870,185 L100,185 Z"
            fill="url(#g1)"/>
          <!-- Blue line: Entradas -->
          <path d="M100,110 C150,105 190,95 220,88 C290,72 340,55 360,52 C420,45 460,42 490,44 C550,47 590,40 620,36 C680,30 720,24 750,20 C800,15 840,14 870,12"
            fill="none" stroke="#4A90D9" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
          <!-- Blue dots -->
          <circle cx="100" cy="110" r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="220" cy="88"  r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="360" cy="52"  r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="490" cy="44"  r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="620" cy="36"  r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="750" cy="20"  r="3.5" fill="#fff" stroke="#4A90D9" stroke-width="2"/>
          <circle cx="870" cy="12"  r="3.5" fill="#4A90D9" stroke="#4A90D9" stroke-width="2"/>

          <!-- Green gradient fill -->
          <path d="M100,150 C150,145 190,140 220,136 C290,128 340,120 360,116 C420,110 460,108 490,110 C550,113 590,107 620,102 C680,96 720,90 750,87 C800,83 840,79 870,76 L870,185 L100,185 Z"
            fill="url(#g2)"/>
          <!-- Green line: Saídas -->
          <path d="M100,150 C150,145 190,140 220,136 C290,128 340,120 360,116 C420,110 460,108 490,110 C550,113 590,107 620,102 C680,96 720,90 750,87 C800,83 840,79 870,76"
            fill="none" stroke="#22c55e" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
          <!-- Green dots -->
          <circle cx="100" cy="150" r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="220" cy="136" r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="360" cy="116" r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="490" cy="110" r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="620" cy="102" r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="750" cy="87"  r="3.5" fill="#fff" stroke="#22c55e" stroke-width="2"/>
          <circle cx="870" cy="76"  r="3.5" fill="#22c55e" stroke="#22c55e" stroke-width="2"/>
        </svg>
      </div>
    </div>

    <!-- BOTTOM ROW: Alerta de Estoque + Uso de Livros por Disciplina -->
    <div class="bottom-row">

      <!-- ALERTA DE ESTOQUE -->
      <div class="alert-card">
        <div class="alert-card-header">
          <div class="alert-card-title">Alerta de Estoque</div>
          <div class="alert-col-label">Estoque Atual</div>
        </div>
        <div class="alert-list">
          <!-- Item 1: Estável -->
          <div class="alert-item">
            <div class="alert-thumb">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div class="alert-name">Manutenção Mecânica Industrial.</div>
            <div class="alert-stock">
              <div class="alert-stock-text">48 unidades</div>
              <div class="stock-bar-bg" style="width:110px">
                <div class="stock-bar-fill" style="width:75%;background:var(--green)"></div>
              </div>
            </div>
          </div>
          <!-- Item 2: Crítico -->
          <div class="alert-item">
            <div class="alert-thumb">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div class="alert-name">Fundamentos da Usinagem de Metais.</div>
            <div class="alert-stock">
              <div class="alert-stock-text">5 unidades</div>
              <div class="stock-bar-bg" style="width:110px">
                <div class="stock-bar-fill" style="width:8%;background:var(--red)"></div>
              </div>
            </div>
          </div>
          <!-- Item 3: Atenção -->
          <div class="alert-item">
            <div class="alert-thumb">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div class="alert-name">Logística e Cadeia de Suprimentos</div>
            <div class="alert-stock">
              <div class="alert-stock-text">12 unidades</div>
              <div class="stock-bar-bg" style="width:110px">
                <div class="stock-bar-fill" style="width:22%;background:#f59e0b"></div>
              </div>
            </div>
          </div>
          <!-- Item 4: Estável -->
          <div class="alert-item">
            <div class="alert-thumb">
              <svg viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
            </div>
            <div class="alert-name">Tecnologia Têxtil: Fibras, Fios e Tecidos.</div>
            <div class="alert-stock">
              <div class="alert-stock-text">32 unidades</div>
              <div class="stock-bar-bg" style="width:110px">
                <div class="stock-bar-fill" style="width:55%;background:var(--green)"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- USO DE LIVROS POR DISCIPLINA -->
      <div class="pie-card">
        <div class="pie-card-title">Uso de Livros por Disciplina</div>
        <div class="pie-body">
          <div class="pie-chart-wrap">
            <!-- SVG Pie Chart built with JS below -->
            <svg id="pieChart" viewBox="0 0 160 160"></svg>
          </div>
          <div class="pie-legend" id="pieLegend"></div>
        </div>
      </div>

    </div><!-- /bottom-row -->

  </div><!-- /content -->
</div><!-- /main -->

<script>
  /* ── NAV SWITCHING ── */
  document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', () => {
      document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      if (item.dataset.href) {
        window.location.href = item.dataset.href;
      }
    });
  });

  /* ── CHART TAB SWITCHING ── */
  document.querySelectorAll('.chart-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.chart-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  /* ── PIE CHART ── */
  const pieData = [
    { label: 'Administração',            pct: 34, color: '#8b5cf6' },
    { label: 'Fabricação Mecânica',      pct: 22, color: '#f59e0b' },
    { label: 'Eletroeletrônica',         pct: 18, color: '#22c55e' },
    { label: 'Eletromecânica',           pct: 14, color: '#f97316' },
    { label: 'Desenvolvimento de Sist.', pct: 12, color: '#CC0000' },
  ];

  function buildPie(data, svgEl, legendEl) {
    const cx = 80, cy = 80, r = 70, holeR = 36;
    let startAngle = -Math.PI / 2;

    data.forEach(slice => {
      const angle = (slice.pct / 100) * 2 * Math.PI;
      const endAngle = startAngle + angle;
      const x1 = cx + r * Math.cos(startAngle);
      const y1 = cy + r * Math.sin(startAngle);
      const x2 = cx + r * Math.cos(endAngle);
      const y2 = cy + r * Math.sin(endAngle);
      const ix1 = cx + holeR * Math.cos(endAngle);
      const iy1 = cy + holeR * Math.sin(endAngle);
      const ix2 = cx + holeR * Math.cos(startAngle);
      const iy2 = cy + holeR * Math.sin(startAngle);
      const large = angle > Math.PI ? 1 : 0;

      const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
      path.setAttribute('d',
        `M ${x1} ${y1} A ${r} ${r} 0 ${large} 1 ${x2} ${y2}
         L ${ix1} ${iy1} A ${holeR} ${holeR} 0 ${large} 0 ${ix2} ${iy2} Z`
      );
      path.setAttribute('fill', slice.color);
      path.setAttribute('stroke', '#fff');
      path.setAttribute('stroke-width', '2');
      svgEl.appendChild(path);

      // Label on slice
      const midAngle = startAngle + angle / 2;
      const labelR = (r + holeR) / 2;
      const lx = cx + labelR * Math.cos(midAngle);
      const ly = cy + labelR * Math.sin(midAngle);
      if (slice.pct >= 10) {
        const txt = document.createElementNS('http://www.w3.org/2000/svg', 'text');
        txt.setAttribute('x', lx);
        txt.setAttribute('y', ly + 3.5);
        txt.setAttribute('text-anchor', 'middle');
        txt.setAttribute('font-size', '9');
        txt.setAttribute('font-family', 'DM Sans,sans-serif');
        txt.setAttribute('font-weight', '600');
        txt.setAttribute('fill', '#fff');
        txt.textContent = slice.pct + '%';
        svgEl.appendChild(txt);
      }

      startAngle = endAngle;
    });

    // Centre circle
    const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
    circle.setAttribute('cx', cx);
    circle.setAttribute('cy', cy);
    circle.setAttribute('r', holeR);
    circle.setAttribute('fill', '#fff');
    svgEl.appendChild(circle);

    // Legend
    data.forEach(slice => {
      const item = document.createElement('div');
      item.className = 'legend-item';
      item.innerHTML = `
        <div class="legend-dot" style="background:${slice.color}"></div>
        <span>${slice.label}</span>
        <span class="legend-pct">${slice.pct}%</span>
      `;
      legendEl.appendChild(item);
    });
  }

  buildPie(pieData, document.getElementById('pieChart'), document.getElementById('pieLegend'));
</script>
</body>
</html>
