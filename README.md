# GLPI Branding Plugin

Plugin para GLPI 10/11 que permite personalizar a identidade visual do GLPI, incluindo logos, titulo, favicon e estilos de interface.

## Funcionalidades

- **Logo personalizado** para o header e pagina de login
- **Favicon** customizado
- **Titulo da pagina** personalizavel
- **Estilos de UI** com presets visuais:
  - Default (padrao do GLPI)
  - Modern (bordas arredondadas, sombras, animacoes)
  - Clean Minimal (flat, limpo)
  - Glassmorphism (transparencia, blur, efeito vidro)
- **CSS gerado automaticamente** a partir das configuracoes
- **Exportar/Importar** configuracoes

## Requisitos

- GLPI >= 10.0.0 e <= 11.x
- PHP >= 8.0

## Instalacao

```bash
cp -r branding /var/www/glpi/plugins/
php bin/console plugin:install branding -u glpi
php bin/console plugin:activate branding
```

## Uso

Acesse **Configuracao > Branding** para configurar:
1. Faca upload do logo e favicon
2. Defina o titulo da pagina
3. Escolha um estilo de UI
4. Clique em **Save**

## Estrutura

```
branding/
├── setup.php              # Registro do plugin e hooks CSS/JS
├── hook.php               # Tabela de configuracao
├── inc/
│   └── config.class.php   # Logica de configuracao e geracao de CSS
├── front/
│   └── config.php         # Pagina de configuracao
└── public/
    └── css/
        ├── branding.css       # CSS auto-gerado (interface)
        └── branding_login.css # CSS auto-gerado (pagina de login)
```

## Licenca

GPLv3
