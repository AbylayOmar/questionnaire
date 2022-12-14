<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionAnswer;
use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        for ($i = 1; $i < 3; ++$i) {
            for ($j = 0; $j < rand(2, 5); ++$j) {
                QuestionAnswer::create([
                    'question_id' => $i,
                    'answer_id' => rand(1, 60),
                ]);
            }
        }
        */
        $questions = [
            'Отметьте, пожалуйста, основную сферу деятельности в которой Вы осуществляете предпринимательскую деятельность?',
            'В течение какого периода времени Вы осуществляете предпринимательскую деятельность?',
            'В каких мерах поддержки со стороны государства, по Вашему мнению, наиболее нуждается бизнес?',
            'Обращались ли Вы ранее за получением имущественной поддержки, оказываемой органами государственной власти и местного самоуправления?',
            'Если Вы обращались за получением государственной имущественной поддержки, укажите какие проблемы возникли при этом?',
            'Доступна ли для Вас информация о предоставляемых мерах имущественной поддержки органами государственной власти и местного самоуправления?',
            'Что, по Вашему мнению, может способствовать информированности субъектов МСП о предоставляемой органами власти имущественной поддержке?',
            'Остались ли Вы удовлетворены результатами обращения за получением имущественной поддержки?',
            'На каком виде права у Вас находится имущество (движимое и недвижимое имущество, в т. ч. земельные участки), которое Вы используете для осуществление своей деятельности?',
            'С какими сложностями Вы сталкиваетесь при использовании имущества для ведения бизнеса?',
            'Какое имущество Вы бы хотели получить для ведения или расширения бизнеса?',
            'Хотели бы Вы получить в аренду государственное или муниципальное имущество, требующее реконструкции (за счет арендатора), для дальнейшего его использования (после завершения реконструкции) на льготных основаниях (ставка 1 тенге)?',
        ];

        $default_ans = [
            Answer::create(['text' => 'Да']),
            Answer::create(['text' => 'Нет']),
            Answer::create(['text' => 'Иное', 'type' => 1]),
        ];

        $answers = [
            [
                Answer::create(['text' => 'Услуги']),
                Answer::create(['text' => 'Промышленность']),
                Answer::create(['text' => 'Торговля']),
                Answer::create(['text' => 'Сельское хозяйство']),
                Answer::create(['text' => 'Строительство']),
                $default_ans[2],
            ],
            [
                Answer::create(['text' => 'Менее 1 года']),
                Answer::create(['text' => 'От 1 года до 5 лет']),
                Answer::create(['text' => 'Затрудняюсь ответить']),
            ],
            [
                Answer::create(['text' => 'Имущественная поддержка (льготная аренда, выкуп в рассрочку, безвозмездное пользование и т.д.)']),
                Answer::create(['text' => 'Информационно-маркетинговая поддержка']),
                Answer::create(['text' => 'Финансовая поддержка (льготные кредиты, субсидии и т.д.)']),
                Answer::create(['text' => 'Правовая поддержка']),
                $default_ans[2],
            ],
            [
                $default_ans[0],
                $default_ans[1],
            ],
            [
                Answer::create(['text' => 'Большое количество требуемых документов необходимых для получения поддержки не ясность порядка, который необходимо соблюсти при получении поддержки']),
                Answer::create(['text' => 'Длительные сроки получения поддержки']),
                Answer::create(['text' => 'Отсутствие информации о порядке получения поддержки']),
                Answer::create(['text' => 'Не возникало проблем при получении поддержки']),
                $default_ans[2],
            ],
            [
                $default_ans[0],
                $default_ans[1],
                $default_ans[2],
            ],
            [
                Answer::create(['text' => 'Размещение информации на сайтах государственных органов власти и местного самоуправления']),
                Answer::create(['text' => 'Через организации, образующие инфраструктуру поддержки субъектов малого и среднего предпринимательства']),
                Answer::create(['text' => 'Информационные брошюры, размещение информации в социальных сетях']),
                Answer::create(['text' => 'Проведение круглых столов с участием государственных органов власти, местного самоуправления и бизнеса по вопросам имущественной поддержки']),
                Answer::create(['text' => 'Размещение информации на информационных стендах органов власти, в МФЦ СМИ (в т. ч. периодические печатные издания, телевидение)']),
            ],
            [
                $default_ans[0],
                $default_ans[1],
                $default_ans[2],
            ],
            [
                Answer::create(['text' => 'На праве аренды']),
                Answer::create(['text' => 'На ином виде правa']),
                Answer::create(['text' => 'Не использую имущество']),
            ],
            [
                Answer::create(['text' => 'Высокий уровень затрат на текущее содержание имущества (коммунальные расходы, ремонт и иные платежи)']),
                Answer::create(['text' => 'Высокий размер налога на имущество - Высокий размер арендной платы']),
            ],
            [
                Answer::create(['text' => 'Движимое имущество (машины, оборудование и прочее)']),
                Answer::create(['text' => 'Производственные здания, помещения']),
                Answer::create(['text' => 'Земельные участки']),
                Answer::create(['text' => 'Коворкинги, лофты']),
                $default_ans[2],
            ],
            [
                $default_ans[0],
                $default_ans[1],
                $default_ans[2],
            ],
        ];

        for ($i = 0; $i < 12; ++$i) {
            $q = Question::create(['text' => $questions[$i]]);
            foreach ($answers[$i] as $a) {
                $q->answers()->attach($a);
            }
        }
    }
}
