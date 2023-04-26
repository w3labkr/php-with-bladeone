# Chocolatey for windows

## Installation

Get-ExecutionPolicy 실행

```shell
Get-ExecutionPolicy
```

ExcutionPolicy를 AllSigned로 설정

```shell
Set-ExecutionPolicy AllSigned
```

ExcutionPolicy를 Bypass로 설정

```shell
Set-ExecutionPolicy Bypass -Scope Process
```

설치하기

```shell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```

확인하기

```shell
choco
```
