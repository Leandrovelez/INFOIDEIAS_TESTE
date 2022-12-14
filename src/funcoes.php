<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $seculo = 0;

        if($ano%100 > 0){
            $seculo = (($ano - $ano%100) / 100) + 1;
        } else{
            $seculo = $ano / 100;
        }

        return $seculo;
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        $primo = 0;
        $is_not_primo = false;
        $numero--;

        while($primo == 0){
            
            $a = $numero;
            while(!$is_not_primo && $a > 1){
                if($numero%$a == 0 && $numero != $a){
                    $is_not_primo = true;
                }
                $a--;
            }

            if(!$is_not_primo){
                $primo = $numero;
            }

            $is_not_primo = false;
            $numero = $numero - 1;
        }

        return $primo;
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $maior = 0;
        $segundoMaior = 0;

        foreach($arr as $array){
            foreach($array as $numero){
                if($numero > $maior){
                    $segundoMaior = $maior;
                    $maior = $numero;
                }
                if($numero > $segundoMaior && $numero < $maior){
                    $segundoMaior = $numero;
                }
            }
        }

        return $segundoMaior;
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool {
        $is_crescente = false;
        $iteracao = 0;

        foreach($arr as $key => $array){
            $array_alterado = $arr;
            unset($array_alterado[$key]);
            $valor_anterior = 0;
            
            foreach($array_alterado as $item){
                if($iteracao != 0){
                    if($item <= $valor_anterior){
                        $is_crescente = false;
                        break;
                    }
                    $is_crescente = true;
                }
                
                $iteracao++;
                $valor_anterior = $item;
            }

            if($is_crescente) break;
        }

        return $is_crescente;
    }

    
}

// TESTES //

    $funcoes = new Funcoes();
    $seculo = $funcoes->SeculoAno(1801);
    echo "O século é: ".$seculo;

    $primo = $funcoes->PrimoAnterior(34);
    echo "<br>O primo anterior é ".$primo;

    $array = array (
        array(260,28,18),
        array(90,1500,130),
        array(24,5,2),
        array(80,1700,15000)
        );

    $segundoMaior = $funcoes->SegundoMaior($array);
    echo "<br> O segundo maior é: ".$segundoMaior;

    $array = [123, -17, -5, 1, 2, 3, 12, 43, 45] ;
    $sequencia = $funcoes->SequenciaCrescente($array);
    echo "<br>A sequência é crescente: ".($sequencia == 1 ? "verdadeiro" : "falso");
   