# hello-grpc

- 安装依赖
`composer install`

- 使用proto生成服务接口和客户端
`cd bin`
`./gen.sh`

- 启动注册中心
`docker-compose up`

- 启动grpc服务 
`cd example/server{1-3}`
`./rr-grpc serve -d`

- 查看服务状态 
`./rr-grpc grpc:workers -i`

- 调用服务 
`cd example`
`php client.php`
