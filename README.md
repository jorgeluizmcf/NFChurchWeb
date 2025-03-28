# Guia de Instalação do Sistema Veritas

## Requisitos do Sistema
- **Sistema Operacional**: Ubuntu 22.04.5 LTS x86_64
- **Kernel**: 6.8.0-52-generic

## Passo 1: Instalação do PHP 5.6

### Adicionar Repositórios Legados do PHP
```bash
sudo apt update
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt upgrade -y
```

### Instalar Pacotes do PHP 5.6
```bash
sudo apt install php5.6 php5.6-cli php5.6-mbstring php5.6-xml php5.6-mysql \
                php5.6-curl php5.6-zip php5.6-gd php5.6-intl php5.6-bcmath -y
```

### Definir Versão Padrão do PHP
```bash
sudo update-alternatives --set php /usr/bin/php5.6
```

### Verificar Instalação
```bash
php -v
```

**Saída Esperada**:
```
PHP 5.6.40-81+ubuntu22.04.1+deb.sury.org+1 (cli)
Copyright (c) 1997-2016 The PHP Group
Zend Engine v2.6.0, Copyright (c) 1998-2016 Zend Technologies
    with Zend OPcache v7.0.6-dev, Copyright (c) 1999-2016, by Zend Technologies
```

## Passo 2: Instalação do MySQL 5.7

### Baixar Configuração do Repositório MySQL
```bash
mkdir -p ~/Downloads
cd ~/Downloads
sudo wget https://dev.mysql.com/get/mysql-apt-config_0.8.12-1_all.deb
sudo chmod 777 mysql-apt-config_0.8.12-1_all.deb
```

### Instalar Pacote do Repositório
```bash
sudo dpkg -i mysql-apt-config_0.8.12-1_all.deb
```

**Observação**: 
- Selecione o repositório Ubuntu Bionic
- Escolha MySQL 5.7 em "Servidor MySQL e Cluster"

### Resolver Problemas de Chave GPG
Se encontrar um erro de chave GPG:
```bash
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys <COLE_O_CÓDIGO_DA_CHAVE>
```

### Instalar MySQL 5.7
```bash
sudo apt-get update
sudo apt install -f mysql-client=5.7* mysql-community-server=5.7* mysql-server=5.7*
```

### Verificar Instalação do MySQL
```bash
sudo mysql -u root -p
```

## Passo 3: Criação do Esquema do Banco de Dados

### Criar Banco de Dados e Usuário
```sql
CREATE DATABASE nfchurch;
CREATE USER '<usuario>'@'localhost' IDENTIFIED BY '<senha>';
GRANT ALL PRIVILEGES ON nfchurch.* TO '<usuario>'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

## Passo 4: Clonar Repositório do Projeto
```bash
cd ~/
git clone https://github.com/nfservice/NFChurchWeb.git
cd NFChurchWeb/
```

## Passo 5: Configuração do Banco de Dados

### Importar Esquema do Banco de Dados
```bash
sudo mysql -u diego -p nfchurch < NFCHURCH.sql
```

### Ajustar Configuração do Host do Banco de Dados
Abra o arquivo de configuração do banco de dados:
```bash
sudo vim sistema/app/Config/database.php
```

Modificar a configuração do host:
```php
public $default = array(
    'datasource' => 'Database/Mysql',
    'persistent' => false,
    'host' => '0.0.0.0',  // Altere o host para 0.0.0.0
    'login' => '<usuario>',
    'password' => '<senha>',
    'database' => 'nfchurch',
    'prefix' => '',
    'encoding' => 'utf8',
);
```

Salvar e sair do arquivo (no Vim: `:wq!`)

## Passo 6: Executar o Projeto Localmente
```bash
php -S 0.0.0.0:8000 -t sistema/app/webroot
```

## Recursos Adicionais
- [Vídeo de Suporte para Instalação do MySQL](https://www.youtube.com/watch?v=SJYE6WByWss&ab_channel=CodersGateway-WebTechsolutions)

## Observações
- Certifique-se de ter o Git instalado antes de clonar o repositório
- Substitua as credenciais de exemplo por valores seguros próprios
- Este guia pressupõe um conhecimento básico de operações de linha de comando no Linux
