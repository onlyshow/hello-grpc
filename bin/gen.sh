#!/usr/bin/env bash

CURRENT_PATH=`pwd`
PROJECT_PATH=$(dirname $(pwd))

PROTO_PATH=$PROJECT_PATH/proto
PHP_OUT=$PROJECT_PATH/grpc
GRPC_OUT=$PROJECT_PATH/grpc

GRPC_PHP_PLUGIN=$CURRENT_PATH/grpc_php_plugin-1.19.0/grpc_php_plugin
PROTOC_GEN_PHP_GRPC=$CURRENT_PATH/protoc-gen-php-grpc-1.0.2-darwin-amd64/protoc-gen-php-grpc
PROTOC=$CURRENT_PATH/protoc-3.7.0-osx-x86_64/protoc

for file in $PROTO_PATH/*
do
    if [ "${file##*.}" = "proto" ];
    then
        FILE_LIST=${FILE_LIST}" ${file}";
    fi
done

$PROTOC --proto_path=$PROTO_PATH --php_out=$PHP_OUT --grpc_out=$GRPC_OUT --plugin=protoc-gen-grpc=$GRPC_PHP_PLUGIN $FILE_LIST
$PROTOC --proto_path=$PROTO_PATH --php_out=$PHP_OUT --php-grpc_out=$GRPC_OUT --plugin=protoc-gen-php-grpc=$PROTOC_GEN_PHP_GRPC $FILE_LIST
