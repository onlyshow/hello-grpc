# hello-grpc

- 安装依赖
`composer install`

- 使用proto生成服务接口和客户端
`cd bin`
`bash ./gen.sh`

- 启动grpc服务 
`./rr-grpc serve -d`

- 查看服务状态 
`./rr-grpc grpc:workers -i`

- 调用服务 
`php client.php`
